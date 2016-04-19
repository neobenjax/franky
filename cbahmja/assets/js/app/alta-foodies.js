$(document).ready(function(){

  publicarGuardado();

  sessionStorage.contenido='';
  $(document).on('click','#editarContenido',function(event){
    event.preventDefault();

    if ($('#contenido').val()!='')
      sessionStorage.contenido = $('#contenido').val();


    // Create Base64 Object
    $.fancybox({type:'iframe',href:getURL()+'previewStatic.php?t='+Base64.encode($("#nombre").val()),width: "100%",modal:true,top:0,fitToView: true});
  });


    $("#alta-foodies").validate({

      rules: {
          // simple rule, converted to {required:true}
          nombre: "required",
          red_social: "required",
          descripcion: "required"

        },
        messages: {
              nombre:"Debe introducir el nombre",
              red_social:"Debe introducir el twitter",
              descripcion: "Debe agregar una descripción"
        },
        onsubmit : false,
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        }
        


  });


  $("#editar-foodies").validate({

      rules: {
          // simple rule, converted to {required:true}
          nombre: "required",
          red_social: "required",
          descripcion: "required"
        },
        messages: {
              nombre:"Debe introducir el nombre",
              red_social:"Debe introducir el twitter",
              descripcion: "Debe agregar una descripción"
        },
        onsubmit : false,
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        }
        


  });

  var form = $('form').attr('id');

  $(document).on('click','#publicar',function(event){

    event.preventDefault();

      if(!$("#"+form).valid())
      {
        return false;

      }

      if ($('#contenido').val()=="")
      {
        $('#editarContenido').parent().append('<label id="contenido-error" class="error" for="contenido">Debe introducir un contenido</label>');
        return false;       
      }

      if ($('#fileadd_1').val() == '')
      {
        if( form == 'alta-foodies' || (form == 'editar-foodies' && $('#prev_1').val()=='') )
        {
            $('#files-error-1').html('Debe subir una imagen');
            $('#files-error-1').css('display','block');
            return false;             
        }          
      }
      else if ($('#fileadd_1').val() == 'error')
      {
          return false;           
      }
      else
      {
          $('#files-error-1').html('');
          $('#files-error-1').css('display','none');            
      }

      $('#tipo').val('publicar');

      borrarLocalStorage(form);
      $("#"+form).submit();
      
  });

  $(document).on('click','#borrador',function(event){

    event.preventDefault();
    $('#tipo').val('borrador');    
    
    if ($('#nombre').val() == '' && $('#red_social').val() == '' && $('#descripcion').val() == '' && $('#contenido').val() == '')
    {
      $( '<label id="formulario-error" class="error" for="formulario" style="width:100%;text-align:center; padding:10px 0px">Debe completar al menos un campo</label>' ).insertAfter( "#div_imagen" );
      return false;
    }
    else
    {
      borrarLocalStorage(form);
      $("#"+form).submit();
    }

  })





/*
$('#alta-foodies, #editar-foodies').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }

       if ($('#contenido').val()=="")
      {
        $('#editarContenido').parent().append('<label id="contenido-error" class="error" for="contenido">Debe introducir un contenido</label>');
        return false;       
      }
      
  });*/



})


function autoguardado()
{

  setInterval(function(){

    form = $('form').attr('id');

    localStorage.setItem(form, '1');

    if(form == 'editar-foodies')
      localStorage.setItem('id_'+form, $('#id').val());

    var datos = {'nombre': $('#nombre').val(), 'red_social': $('#red_social').val(), 'descripcion': $('#descripcion').val(), 'contenido': $('#contenido').val()};

    localStorage.setItem('datos_'+form,JSON.stringify(datos));

  },300000)

}


function publicarGuardado()
{
    form = $('form').attr('id');

    if (localStorage.getItem(form) !== null) {

      if (form == 'alta-foodies' ||  (form == 'editar-foodies' && localStorage.getItem('id_'+form) !== null && localStorage.getItem('id_'+form) == $('#id').val()) )
      {

        valores = JSON.parse(localStorage.getItem('datos_'+form));

        if (valores.nombre != '' || valores.red_social != '' || valores.descripcion != '' || valores.contenido != '')
        {
            $( "#dialog-confirm" ).dialog({
              resizable: false,
              height:180,
              width:380,
              modal: true,
              buttons: {
                "Aceptar": function() {
                  $('#nombre').val(valores.nombre);
                  $('#red_social').val(valores.red_social);
                  $('#descripcion').val(valores.descripcion);
                  $('#contenido').val(valores.contenido);
                  autoguardado();
                   $( this ).dialog( "close" );
                },
                Cancel: function() {
                  
                  borrarLocalStorage(form);

                  autoguardado();
                  $( this ).dialog( "close" );
                }
              }
            });
        }
        else
          autoguardado();
      }
      else
        autoguardado();
    }
    else
      autoguardado();


}

function borrarLocalStorage(formulario)
{
  localStorage.removeItem(formulario);
  localStorage.removeItem('datos_'+formulario);
  localStorage.removeItem('id_'+formulario);
}


var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

function cargarText(contenido){

  if(contenido != '')
  {
    if($( "#contenido-error" ).length)
      $('#contenido-error').remove();
  }
  
  $("#contenido").val(contenido);
}


$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:

      var form = $('.form-panel').find('form').attr('id');
      var url =  '../includes/UploadHandler.php';

      if(form == 'editar-foodies')
        url = '../../includes/UploadHandler.php';

    
    $('.fileupload').click(function(){

        var fileId = $(this).data('id');

        $('#fileupload_'+fileId).fileupload({
                url: url,
                dataType: 'json',
                autoUpload: true,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 999000,
                singleFileUploads: false,
                maxNumberOfFiles: 1,

                formData: [{ name: 'custom_dir', value: 'assets/foodies' }, {name: 'accept_file_types', value: '(gif|jpe?g|png)'}, {name: 'min_height', value: '450'}, {name: 'min_width', value: '450'}, {name: 'thumb', value: 1}], 
                done: function (e, data) {

                    var html = '';

                    // para tener los nombres finales de los archivos subidos

                    for(var k in data.result.files) {
                      if (typeof data.result.files[k].error == "undefined")
                      {
                        html += '<input type="hidden" name="archivos_'+fileId+'" value="'+data.result.files[k].name+'">';
                        $('#fileadd_'+fileId).val('add');
                      }
                      else
                        $('#fileadd_'+fileId).val('error'); 
                        
                    }

                    $('#files-error-'+fileId).html('');
                    $('#files_'+fileId).append(html);
                    

                },
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent)

            }).on('fileuploadadd', function (e, data) {

                 //data.context = $('<div/>').appendTo('#files_'+fileId);

                 data.context = $('#files_'+fileId).html('<div/>');
                $.each(data.files, function (index, file) {
                    var node = $('<p/>')
                            .append($('<span/>').text(file.name));
                    if (!index) {
                        node
                            .append('<br>')
                            
                    }
                    //node.appendTo(data.context);
                    $('#files_'+fileId).html(node);
                });
            }).on('fileuploadprocessalways', function (e, data) {

                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);

                if (file.error) {

                    node
                        .html(' ')
                        .html($('<span class="text-danger"/>').text(file.error));
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            }).on('fileuploadprogressall', function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress_'+fileId+' .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }).on('fileuploaddone', function (e, data) {
                $.each(data.result.files, function (index, file) {
                    if (file.url) {
                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        $(data.context.children()[index])
                            .wrap(link);
                    } else if (file.error) {
                        var error = $('<span class="text-danger"/>').text(file.error);
                        $(data.context.children()[index])
                            .html('<br>')
                            .html(error);
                    }
                });
            }).on('fileuploadfail', function (e, data) {

                $.each(data.files, function (index) {
                    var error = $('<span class="text-danger"/>').text('File upload failed.');
                    $(data.context.children()[index])
                        .html('<br>')
                        .html(error);
                });
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');



    });


});