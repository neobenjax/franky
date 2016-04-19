$(document).ready(function(){


	$('#filtro1, #filtro2').on('change',function(){

		$('#formFiltro').submit()

	})


	 $("div.holder").jPages({
      containerID : "comentarios",
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1,
      previous    : "anterior",
      next        : "siguiente"
    });


})