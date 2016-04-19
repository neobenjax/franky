<link rel="stylesheet" href="<?php echo $fullPath?>assets/css/normalize.css">
<link rel="stylesheet" href="<?php echo $fullPath?>assets/css/main.css">
<script src="<?php echo $fullPath?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
<link rel="stylesheet" href="<?php echo $fullPath?>assets/css/jquery-ui.css">
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- Codigos de redimension para evitar brincos en aspecto visual al redimensionar  -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $fullPath;?>assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="<?php echo $fullPath;?>assets/js/vendor/jquery-ui.min.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo $fullPath;?>assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $fullPath;?>assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo $fullPath;?>assets/js/jquery.validate.js"></script>
<!--script src="//connect.facebook.net/en_US/all.js"></script-->
<!--MAPS-->
<?php  if($pagina=='contacto') {?>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsBG0jLtA7K_1DSTn8CFKI5M8J-qjGfJU">
</script>
<?php } ?>

<!--SLIDER TOUCH-->
<script src="<?php echo $fullPath?>assets/js/slick.min.js"></script>
<!--PLACEHOLDERS EN IE-->
<script type="text/javascript" src="<?php echo $fullPath?>assets/js/placeholder_fix.js"></script>
<!--SCROLLS CUSTOMS-->
<script type="text/javascript" src="<?php echo $fullPath?>assets/js/jquery.nicescroll.min.js"></script>
<!--PAGINADOR CUSTOM-->
<script type="text/javascript" src="<?php echo $fullPath?>assets/js/jPages_custom.min.js"></script>
<!--MEDIAQUERIES EN JS-->
<script type="text/javascript" src="<?php echo $fullPath?>assets/js/matchMedia.js"></script>
<!--ZOOM IMAGE-->
<script type="text/javascript" src="<?php echo $fullPath?>assets/js/jquery.elevatezoom-3.0.8.min.js"></script>
<!--ANGULAR-->
<script src="<?php echo $fullPath?>assets/js/angular/angular.js"></script>

<script type="text/javascript">
		angular.module('app',[])
				.controller('ctrlMain',function($scope,$filter){
				})
</script>

<script type="text/javascript">
	//DOCUMENT READY GLOBAL
	var FULLPATH = "<?php echo $fullPath?>",
	PAGINA = "<?php echo $pagina?>",
	SUBPAGINA = "<?php echo $subpagina?>",
	CATEGORIA = "<?php echo $categoria?>";

	$(document).ready(function(){
		$.placeholder();
		matchMax1024 = window.matchMedia('(max-width: 1024px)');
		matchMin1025 = window.matchMedia('(min-width: 1025px)');
	    matchMax768 = window.matchMedia('(max-width: 768px)');
	    matchMax667 = window.matchMedia('(max-width: 667px)');
	    matchMax480 = window.matchMedia('(max-width: 480px)');
	    matchMax320 = window.matchMedia('(max-width: 320px)');
	    //var windowWidth = window.innerWidth || $(window).width();//innerWidth takes actual width, width takes minus scroll
	    $.datepicker.regional['es'] = {
	        closeText: 'Cerrar',
	        currentText: 'Hoy',
	        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	        monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	        dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
	        dayNamesMin: ['D','L','M','M','J','V','S'],
	        weekHeader: 'Sm',
	        dateFormat: 'dd/mm/yy',
	        firstDay: 1,
	        isRTL: false,
	        yearRange: '1930:2012',
	         minDate: new Date(1900,1-1,1), maxDate: '-18Y',
	        showMonthAfterYear: false,
	        yearSuffix: ''
	    };
	    $.datepicker.setDefaults($.datepicker.regional['es']);

			setTimeout(resize, 100);
	    $(window).resize(function(){
	        setTimeout(resize,100);
	    });
	    function resize(){
				
	    }




		<?php  if($pagina=='index') {?>

		<?php  } ?>

	});

	//FUNCIONES UTILITARIAS
	var map;var marker;
	function initMap(myLatLng) {
		// Create a map object and specify the DOM element for display.
		map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			scrollwheel: false,
			zoom: 15
		});

		// Create a marker and set its position.
		marker = new google.maps.Marker({
			map: map,
			position: myLatLng,
			title: '-'
		});
	}
	function moveMap( moveLatLng ) {
	    marker.setPosition( moveLatLng );
	    map.panTo( moveLatLng );
	};
	function alertaFancy(titulo,mensaje,btnOk){
			contenidoMensaje = '<div class="contenedorAlertas"><div class="plecaTitulo">'+titulo+'</div><div class="textoAlerta">'+mensaje+'</div><div class="TXT_CENTER accionesConfirmLayer"><a href="#" class="btn border BG_BLANCO NEGRO cierreFancy">'+btnOk+'</a></div></div>';
			$.fancybox({padding:0,content:contenidoMensaje,closeBtn : false,modal:true});
	}

	$(document).on('click','.cierreFancy',function(event){
					event.preventDefault();
					$.fancybox.close();
	});


	function confirmFancy(titulo,mensaje,btnOk,btnCancel,inversa){
			if(!inversa)
					contenidoMensaje = '<div class="contenedorAlertas"><div class="plecaTitulo">'+titulo+'</div><div class="textoAlerta">'+mensaje+'</div><div class="TXT_LEFT accionesConfirmLayer"><a href="'+btnCancel.enlace+'" class="btn border BG_BLANCO NEGRO cierreFancy" id="no">'+btnCancel.texto+'</a><a href="'+btnOk.enlace+'" class="btn border_NEGRO BG_NEGRO BLANCO confirm F_RIGHT" id="si">'+btnOk.texto+'</a></div></div>';
			else
					contenidoMensaje = '<div class="contenedorAlertas"><div class="plecaTitulo">'+titulo+'</div><div class="textoAlerta">'+mensaje+'</div><div class="TXT_LEFT"><a href="'+btnOk.enlace+'" class="btn BG_NEGRO BLANCO confirm" id="si">'+btnOk.texto+'</a><a href="'+btnCancel.enlace+'" class="btn BG_NEGRO BLANCO cierreFancy" id="no">'+btnCancel.texto+'</a></div></div>';
			$.fancybox({padding:0,content:contenidoMensaje,closeBtn : false,modal:true,wrapCSS : 'customCloseLayer'});
	}
	function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
	}

	function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i=0; i<ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1);
					if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
			}
			return "";
	}

	function checkCookie(cname) {
			var cook = getCookie(cname);
			if (cook != "") {
					return cook;
			} else {
					return '';
			}
	}

	$(window).on("popstate", function(event) {
	    link = location.pathname.replace(/^.*[\\/]/, "");

	});


	function paginadorInit(startPage,perPage,containerID,paginadorClass,minHeight,callback){
		minHeight = minHeight||false;
		//callback = callback || "";
        $(paginadorClass).jPages({
            containerID  : containerID,
            perPage      : perPage,
            startPage    : startPage,
            startRange   : 1,
            midRange     : 5,
            endRange     : 1,
            first        : '',
            previous     : 'anterior',
            next         : 'siguiente',
            last         : '',
            minHeight    : minHeight,
            callback     : function(pages,items){
                           }
        });
            
            
	}


    function calendarioInit($selector){
        $selector.datepicker({
              showOn: "both",
              buttonImage: FULLPATH+"assets/img/icono_calendario.png",
              buttonImageOnly: true,
              buttonText: "00/00/0000",
              changeMonth: true,
              changeYear: true,
              hideIfNoPrevNext: true,
              nextText: "&gt;",
              prevText: "&lt;",
              closeText: "X",
              showButtonPanel: true,
              beforeShow: function(){
                $("#ui-datepicker-div").addClass("calendarioFlotante");
              }
            });
	}


	function isInt(value) {
	  var x;
	  if (isNaN(value)) {
	    return false;
	  }
	  x = parseFloat(value);
	  return (x | 0) === x;
	}

</script>