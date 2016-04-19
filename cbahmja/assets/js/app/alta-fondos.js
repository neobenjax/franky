$(document).ready(function(){


  $("#alta-fondo").validate({

    rules: {
        // simple rule, converted to {required:true}
        horario: "required",
        'imagen[]': "required"             
      },
      messages: {
            horario: "Debe seleccionar un horario",
            'imagen[]': "Debe subir, al menos, una imagen"
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-fondo').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
      
  });



})