$(document).ready(function(){


  $("#alta-antojos").validate({

    rules: {
        // simple rule, converted to {required:true}
        antojo: "required",

      },
      messages: {
            antojo:"Debe introducir un nombre para su antojo"
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


  $("#editar-antojos").validate({

    rules: {
        // simple rule, converted to {required:true}
        antojo: "required",
      },
      messages: {
            antojo:"Debe introducir un nombre para su antojo",
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-antojos, #editar-antojos').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
      
  });



})