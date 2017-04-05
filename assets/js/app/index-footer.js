
$('#makeAjaxCall').click(function(event){
	event.preventDefault();
	$.ajax({
        url: confSitio.BASE_URL+'includes/ajax.php',
        data:{
            variable     :   'pollo'
        },
        success: function(data, status) {
            console.log(data);
            $('#contenidoAjax').html(data);
        },
        error: function() {
        	alert('Error');
        }
    });
});