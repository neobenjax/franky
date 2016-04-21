<?php
session_start();


if (isset($_SESSION['mark']) === false)
{
  session_regenerate_id(true);
  $_SESSION['mark'] = true;
}


if (isset($_SESSION['LAST_ACTIVITY2']) && (time() - $_SESSION['LAST_ACTIVITY2'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}

$_SESSION['LAST_ACTIVITY2'] = time();

ob_start();
//error_reporting(0);

header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');


require 'includes/start.php';
$baseURL = $helpers->getURL();
$_GET['section']    = htmlspecialchars($_GET['section'], ENT_QUOTES, 'UTF-8');
$_GET['contenido']  = (isset($_GET['contenido']) && $_GET['contenido'] != '') ? htmlspecialchars($_GET['contenido'], ENT_QUOTES, 'UTF-8') : 0;


    if (empty($_SESSION['id']))
    {
        $url = $baseURL.'iniciador.php';
        echo '<script>window.location = "'.$url.'";</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?=$appName?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $baseURL;?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $baseURL;?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $baseURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo $baseURL;?>assets/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo $baseURL;?>assets/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo $baseURL;?>assets/fancybox/jquery.fancybox.css?v=2.1.5" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

      var url = "<?php echo $baseURL;?>";

    </script>


  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b><?php echo $appName;?></b></a>
            <!--logo end-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo $baseURL;?>Controllers/functions.php?logout=1">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="http://codice.com/img/logo_codice.png" class="img-square" width="100"></a></p>
                  <h5 class="centered">Menú</h5>

                  <?php if ($helpers->tienePermiso('alta-xxx')==1) { ?>
                    <li class="sub-menu">
                        <a class="active" href="javascript:;" >
                            <i class="fa fa-book"></i>
                            <span>XXX</span>
                        </a>
                        <ul class="sub">
                            <li class="active"><a  href="<?php echo $baseURL;?>section/alta-XXX">Alta de XXX</a></li>
                        </ul>
                        <ul class="sub">
                            <li class="active"><a  href="<?php echo $baseURL;?>section/listado-XXX">Listado de XXX</a></li>
                        </ul>
                    </li >
                  <?php } ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <br>
            <!--h3><i class="fa fa-angle-right"></i><?php echo $_GET['section'];?></h3-->

            <?php

                  if ($helpers->tienePermiso($_GET['section'])==1 || $_GET['section'] == 'index')
                    require $helpers->getView($_GET['section']);
                  else
                    header("Location: ".$baseURL."section/index");

            ?>

        </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - <?php echo $company;?>
              <a href="/section/index#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo $baseURL;?>assets/js/jquery.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo $baseURL;?>assets/js/bootstrap-fileupload.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/date.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/daterangepicker.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/advanced-form-components.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo $baseURL;?>assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

    <script src="<?php echo $baseURL;?>assets/js/highlight.pack.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/tabifier.js"></script>
    <script src="<?php echo $baseURL;?>assets/js/jPages.min.js"></script>

    <!-- Para incluir el upload de imagens -->

        <script src="<?=$baseURL?>assets/js/jquery.ui.widget.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="<?=$baseURL?>assets/js/canvas-to-blob.min.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="<?=$baseURL?>assets/js/jquery.fileupload.js"></script>
        <!-- The File Upload processing plugin -->
        <script src="<?=$baseURL?>assets/js/jquery.fileupload-process.js"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="<?=$baseURL?>assets/js/jquery.fileupload-image.js"></script>
        <!-- The File Upload validation plugin -->
        <script src="<?=$baseURL?>assets/js/jquery.fileupload-validate.js"></script>

    <!-- ***************************************************************** -->

    <!--common script for all pages-->
    <script src="<?php echo $baseURL;?>assets/js/common-scripts.js"></script>

    <script src="<?php echo $baseURL.$helpers->getJs($_GET['section'])?>"></script>


    <!--script for this page-->

  <!--script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script-->

  <?php include('includes/js.php');?>

  </body>
</html>
<script>
//alert = function() {};
prompt = function() {};
//confirm = function() {};
console = function() {};
</script>
