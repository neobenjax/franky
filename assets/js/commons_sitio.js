function errorHandling(message) {
  this.name = 'errorHandling';
  this.message = message || 'Default Message';
  this.stack = (new Error()).stack;
}
errorHandling.prototype = Object.create(Error.prototype);
errorHandling.prototype.constructor = errorHandling;

window.onerror = function(msg, url, line, col, error) {
   var extra = !col ? '' : '\ncolumn: ' + col;
   extra += !error ? '' : '\nerror: ' + error;
   console.log("Error: " + msg + "\nurl: " + url + "\nline: " + line + extra);
   var suppressErrorAlert = true;
   return suppressErrorAlert;
};
/*
window.console.log = function(param) {
    $('body').append('<div>'+param+'</div>');
};
*/
var utiles;
//Todos los eventos en document ready aqui.
$(document).ready(function(){
	
	$.placeholder();
	matchMax1024 = window.matchMedia('(max-width: 1024px)');
	matchMin1025 = window.matchMedia('(min-width: 1025px)');
	matchMax768 = window.matchMedia('(max-width: 768px)');
	matchMax667 = window.matchMedia('(max-width: 667px)');
	matchMax480 = window.matchMedia('(max-width: 480px)');
	matchMax320 = window.matchMedia('(max-width: 320px)');

});

$(document).on('click','.cierreFancy',function(event){
	event.preventDefault();
	$.fancybox.close();
});


utiles = {
	alertaChica	: 	function(params)
	{
		titulo = params.titulo;
		mensaje = params.mensaje;
		btnOk = params.btnOk;

		configFancy = {
	        padding:0,
	        fitToView:false,
	        wrapCSS : 'alertaScan',
	        autoCenter: false,
	        closeEffect: 'none',
	        closeSpeed:0,
	        closeBtn:false,
	        helpers: {
	                overlay: { closeClick: false,locked: true } //Disable click outside event
	        }
	    }

	    if (params.close)
		    configFancy.afterClose = params.close;

	    $contenedorAlerta = $(document.createElement('div')).addClass('alertaScanCont');
	    $titulo = $(document.createElement('div')).addClass('titulo').html(titulo);
	    $textoMensaje = $(document.createElement('div')).addClass('textoMensaje').html(mensaje);
	    $accionesConfirm = $(document.createElement('div')).addClass('accionesConfirmLayer');
	        $boton = $(document.createElement('a')).addClass('cierreFancy').text(btnOk);
	        $accionesConfirm.append($boton);

	    $contenedorAlerta
	            .append($titulo)
	            .append($textoMensaje)
	            .append($accionesConfirm);
	    configFancy.content = $contenedorAlerta;

	    $.fancybox(configFancy);
	},
	setCookie : function(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+d.toUTCString();
	    document.cookie = cname + "=" + cvalue + "; " + expires +";path=/";
	},
	getCookie : function(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	    }
	    return "";
	},
	checkCookie : function(cname) {
	    var user = getCookie(cname);
	    if (user != "") {
	        return user;
	    } else {
	        return '';
	    }
	},
	isInt : function(value) {
	  var x;
	  if (isNaN(value)) {
	    return false;
	  }
	  x = parseFloat(value);
	  return (x | 0) === x;
	}
};

