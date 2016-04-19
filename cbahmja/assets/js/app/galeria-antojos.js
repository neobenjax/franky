$(document).ready(function(){


	$('#filtro1').on('change',function(){

		$('#formFiltro').submit()

	})


    $("div.holder").jPages({
      containerID : "antojos",
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1,
      previous    : "anterior",
      next        : "siguiente"
    });

    var cookie = getCookie('currentPageAnt');

    if ( cookie != '')
    {
    	var page = parseInt(cookie);
      	/* jump to that page */
      	$("div.holder").jPages( page );
    }
})


function sendForm(formulario)
{

	$('#'+formulario+' #page').val($('.jp-current').html());
	$('#'+formulario).submit();
}