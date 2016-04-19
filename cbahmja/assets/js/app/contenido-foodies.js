$(document).ready(function(){


  $("#contenido-foodies").validate({

    rules: {
        // simple rule, converted to {required:true}
        titulo: "required",
        contenido: "required"
      },
      messages: {
            titulo:"Debe introducir el título",
            contenido:"Debe introducir el contenido"
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }

});


$('#contenido-foodies').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }

  });



})
