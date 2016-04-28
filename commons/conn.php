<?php

if ($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1' || $_SERVER['SERVER_NAME']=='proyectosphp.codice.com')
{
	# CONSTANTES DE CONEXIÓN DEV
	define('DATABASE_NAME','proyphp_sist_progra');
	define('SERVER','71.19.228.214');
	define('USERNAME','pp_s1st3m4');
	define('PASSWORD','s1st3m416');
	define('DIRECTORIO','/adminProgra/');
	define('RUTA','/adminProgra/');

}
elseif ($_SERVER['SERVER_NAME']=='XXX.XXX.XXX.XX')
{
	# CONSTANTES DE CONEXIÓN TEST
	define('USERNAME','');
	define('DATABASE_NAME','');
	define('SERVER','');
	define('PASSWORD','');
	define('DIRECTORIO','/');
	define('RUTA','');

}


define('APP_ID', '');
define('APP_SECRET', '');

define('YOUR_CONSUMER_KEY', '');
define('YOUR_CONSUMER_SECRET', '');
