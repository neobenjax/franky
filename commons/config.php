<?php
#colocar los servers para dev y para production
if ($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1' || $_SERVER['SERVER_NAME']=='proyectosphp.codice.com')
{
    define('DIRECTORIO','/directorio/');
    define('RUTA','/directorio/');
    define('APP_ID', '');
    define('APP_SECRET', '');
    define('YOUR_CONSUMER_KEY', '');
    define('YOUR_CONSUMER_SECRET', '');
    define('ENVIRONMENT','development');
}
elseif ($_SERVER['SERVER_NAME']=='XXX.XXX.XXX.XX')
{   
    define('DIRECTORIO','/');
    define('RUTA','');
    define('APP_ID', '');
    define('APP_SECRET', '');
    define('YOUR_CONSUMER_KEY', '');
    define('YOUR_CONSUMER_SECRET', '');
    define('ENVIRONMENT','production');
}
//Cookies seguras
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "" && ENVIRONMENT == 'production')
  session_set_cookie_params(0, NULL, NULL, isset($_SERVER["HTTPS"]), TRUE);

session_start();

$_SESSION['ENVIRONMENT'] = ENVIRONMENT;