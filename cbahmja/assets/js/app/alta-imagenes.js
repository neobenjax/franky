$(document).ready(function(){


  $("#alta-imagenes").validate({

    rules: {
        // simple rule, converted to {required:true}
        antojo: "required",
        'imagen[]': "required"             
      },
      messages: {
            antojo: "Debe especificar un antojo",
            'imagen[]': "Debe subir, al menos, una imagen"
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-imagenes').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
      
  });



})