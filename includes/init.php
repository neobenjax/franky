<?php
//HTTPS VALIDACION

include_once 'commons/helpers.php';

$helpers = new Helpers();

$baseURL = $helpers->getURL();
//Variables de navegacion
$pagina = (isset($_GET['pagina']))?htmlspecialchars($_GET['pagina'], ENT_QUOTES, 'UTF-8'):'index';
$subpagina = (isset($_GET['subpagina']))?htmlspecialchars($_GET['subpagina'], ENT_QUOTES, 'UTF-8'):'default';
$categoria = (isset($_GET['categoria']))?htmlspecialchars($_GET['categoria'], ENT_QUOTES, 'UTF-8'):'default';
$producto = (isset($_GET['producto']))?htmlspecialchars($_GET['producto'], ENT_QUOTES, 'UTF-8'):'default';
$actual_link = "https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]";

$handler->debug($actual_link, 'Link Actual');
$handler->debug($pagina, 'Pagina');
$handler->debug($subpagina, 'SubPagina');
$handler->debug($categoria, 'Categoria');
$handler->debug($producto, 'Producto');

$helpers->getController($pagina);

?>