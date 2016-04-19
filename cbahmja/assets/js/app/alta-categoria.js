$(document).ready(function(){


  $("#alta-categoria").validate({

    rules: {
        // simple rule, converted to {required:true}
        nombre: "required",

      },
      messages: {
            nombre:"Debe introducir un nombre para su categoría"
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


  $("#editar-categoria").validate({

    rules: {
        // simple rule, converted to {required:true}
        nombre: "required",
      },
      messages: {
            nombre:"Debe introducir un nombre para su categoría",
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-categoria, #editar-categoria').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }

      var uri = gen_uri($('#nombre').val());

      $('#varseo').val(uri);

      
  });



})


function gen_uri(txt_src){
 
   txt_src = txt_src.replace(/á|é|í|ó|ú|ñ/gi, function myFunction(x){

      if (x=='á') return 'a';
      else if (x=='é') return 'e';
      else if (x=='í') return 'i';
      else if (x=='ó') return 'o';
      else if (x=='ú') return 'u';
      else if (x=='ñ') return 'n';

   });

   var output = txt_src.replace(/[^a-zA-Z0-9]/g,' ').replace(/\s+/g,"-").toLowerCase();
   /* remove first dash */
   if(output.charAt(0) == '-') output = output.substring(1);
   /* remove last dash */
   var last = output.length-1;
   if(output.charAt(last) == '-') output = output.substring(0, last);
   
   return output;
}


