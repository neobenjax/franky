$(document).ready(function(){

	 $("#comentario-frase").validate({

    rules: {
        // simple rule, converted to {required:true}
        comentarios: "required"

      },
      messages: {
            comentarios:"Debe ingresar su comentario",
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }

});

	$('#comentario-frase').submit(function(){

	 	if(!$("#comentario-frase").valid())
		    return false;

      	$.ajax({
	        url:'../Controllers/functions.php',
	        type:"POST",
	        data: $( this ).serialize(),
	        success: function(data){
	        	if (data==0)
	        	{
							varTituloPost = $(".tituloPost").html();
							$('#error_msg').html('Se ha producido un error');
	        		$('#box_error').css('display','block');
	        	}
	        	else
	        	{
							$.fancybox.close();
	        		location.reload();
	        	}

	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            alert("Status: " + textStatus); alert("Error: " + errorThrown);
	        }
    	});

      return false;
  	});
})
