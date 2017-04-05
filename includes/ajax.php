<?php 
session_start();
include_once '../commons/helpers.php';
$helpers = new Helpers();

$baseURL = $_SESSION['baseURL'];

echo "Constante de entorno en session:".$_SESSION['ENVIRONMENT'];
echo "<br>";
echo "BaseURL:".$baseURL;
echo "<br>";
echo $helpers->getTestData();
?>