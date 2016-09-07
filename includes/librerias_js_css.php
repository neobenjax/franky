<link rel="stylesheet" href="<?php echo $baseURL?>assets/css/normalize.css">
<link rel="stylesheet" href="<?php echo $baseURL?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo $baseURL?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $baseURL;?>assets/js/librerias/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

<script src="<?php echo $baseURL?>assets/js/librerias/vendor/modernizr-2.8.3.min.js"></script>
<script src="<?php echo $baseURL;?>assets/js/librerias/vendor/jquery-1.11.2.min.js"></script>
<script src="<?php echo $baseURL;?>assets/js/librerias/vendor/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo $baseURL;?>assets/js/librerias/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo $baseURL;?>assets/js/librerias/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo $baseURL;?>assets/js/librerias/matchMedia.js"></script>
<script type="text/javascript" src="<?php echo $baseURL;?>assets/js/librerias/placeholder_fix.js"></script>
<script src="//connect.facebook.net/en_US/all.js"></script>

<script type="text/javascript">
    var confSitio = {
        ACTUAL_LINK: '<?php echo htmlspecialchars(strip_tags($actual_link), ENT_QUOTES, 'UTF-8');?>',
        BASE_URL: '<?php echo $baseURL;?>',
        ASSETS:'<?php echo $baseURL;?>assets/',
        ROUTE: {
            pagina: '<?php echo $pagina;?>',
            subpagina: '<?php echo $subpagina;?>',
            categoria: '<?php echo $categoria;?>',
            producto: '<?php echo $producto;?>'
        }
    };
</script>


<?php

	$librerias = array();
	$libreriasFooter = array();

	$librerias['nombre-de-pagina']['default'] = array();
	$libreriasFooter['nombre-de-pagina']['default'] = array();

	$librerias['nombre-de-pagina']['default'][0] = 'assets/js/app/nombre-de-pagina.js';
	$libreriasFooter['nombre-de-pagina']['default'][0] = 'assets/js/app/nombre-de-pagina-footer.js';

	$contenido = (is_numeric($subpagina)) ? 'default' : $subpagina;
    $helpers->getJs($librerias,$pagina,$contenido);
?>

<script type="text/javascript" src="<?php echo $baseURL?>assets/js/commons_sitio.js"></script>