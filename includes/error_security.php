<?php
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
/*
** MANEJO DE ERRORES
** INSTALAR EXTENSION DE CHROME "PHP CONSOLE Y USAR EL PASSWORD PARA DESBLOQUEAR EL DEBUGGING"
*/
/*error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
require_once('commons/PhpConsole/__autoload.php');
$debugPassword = 'c0d1c32375';
$connector = PhpConsole\Connector::getInstance();
$connector->setPassword($debugPassword);
$connector->getDebugDispatcher()->dispatchDebug('Habilitado para depurar');
$handler = PhpConsole\Handler::getInstance();
/*if($connector->isAuthorized()){}*/
$handler->start();
/*
** FIN MANEJO DE ERRORES
*/