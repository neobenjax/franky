<?php
session_start();

require '../../commons/helpers.php';
$helpers = new Helpers();



if (isset($_GET['logout']) && $_GET['logout'] == '1')
{

		unset($_SESSION['id']);
		header('Location: ../section/index');

}

?>