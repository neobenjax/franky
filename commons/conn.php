<?php

if ($_SESSION['ENVIRONMENT']=='development')
{
	# CONSTANTES DE CONEXIÓN DEV
	define('DATABASE_NAME','');
	define('SERVER','');
	define('USERNAME','');
	define('PASSWORD','');
}
elseif ($_SESSION['ENVIRONMENT']=='production')
{
	# CONSTANTES DE CONEXIÓN PROD
	define('USERNAME','');
	define('DATABASE_NAME','');
	define('SERVER','');
	define('PASSWORD','');
}