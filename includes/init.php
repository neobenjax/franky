<?php
//HTTPS VALIDACION
if($_SERVER['SERVER_PORT']==443)
  $_SERVER['HTTPS'] = 'on';

if(isset($_SERVER['HTTP_X_FORWARDED_PORT']) && $_SERVER['HTTP_X_FORWARDED_PORT']==443)
  $_SERVER['HTTPS'] = 'on';

if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']=='https')
  $_SERVER['HTTPS'] = 'on';


//Redireccion a HTTPS cuando no es localhost o dominios sin soporte a https
if((!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "") && $_SERVER['SERVER_NAME']!='localhost' && $_SERVER['SERVER_NAME']!='127.0.0.1'){
  
     $redirect = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
     header("HTTP/1.1 301 Moved Permanently");
     header("Location: $redirect");
     exit();
}


//Cookies seguras
if ($_SERVER['SERVER_NAME']!='localhost' && $_SERVER['SERVER_NAME']!='127.0.0.1' && $_SERVER['SERVER_NAME']!='proyectosphp.codice.com')
  session_set_cookie_params(0, NULL, NULL, isset($_SERVER["HTTPS"]), TRUE);


session_start();
error_reporting(0);

include_once 'commons/helpers.php';


$helpers = new Helpers();

$baseURL = $helpers->getURL();
//Variables de navegacion
$pagina = (isset($_GET['pagina']))?htmlspecialchars($_GET['pagina'], ENT_QUOTES, 'UTF-8'):'index';
$subpagina = (isset($_GET['subpagina']))?htmlspecialchars($_GET['subpagina'], ENT_QUOTES, 'UTF-8'):'default';
$categoria = (isset($_GET['categoria']))?htmlspecialchars($_GET['categoria'], ENT_QUOTES, 'UTF-8'):'default';
$producto = (isset($_GET['producto']))?htmlspecialchars($_GET['producto'], ENT_QUOTES, 'UTF-8'):'default';
$actual_link = "https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]";

include_once $helpers->getController($pagina);
?>