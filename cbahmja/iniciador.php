<?php
session_set_cookie_params(0, NULL, NULL, isset($_SERVER["HTTPS"]), TRUE); 
session_start();

if (isset($_SESSION['mark']) === false)
{
  session_set_cookie_params(0, NULL, NULL, isset($_SERVER["HTTPS"]), TRUE);
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
error_reporting(0);
require 'includes/start.php';
$baseURL = $helpers->getURL();
require $helpers->getController('login');
#echo $baseURL;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

        <section class="wrapper site-min-height" style="min-height:500px !important; text-align:center">
                  <form class="form-horizontal style-form" method="post" action="#" enctype="multipart/form-data" >
                    <div class="form-group" >
                      <label class="col-sm-5 control-label" style="text-align:right !important">Usuario:</label>
                      <div class="col-sm-6">
                        <input name="user" type="text" class="form-control" required style="width:40% !important">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label" style="text-align:right !important">Password:</label>
                      <div class="col-sm-6">
                        <input name="pass" type="password" class="form-control" required style="width:40% !important">
                      </div>
                    </div>
                    <div class="form-group" style="margin: auto auto; <?php echo $style;?>">
                      <?php echo $msg;?>
                    </div>
                    <div class="form-group last" style="margin:auto auto">
                      <button type="submit" class="btn btn-theme04">
                        <span>Enviar</span>
                      </button>
                    </div>
                  </form>
        </section>

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
    
   
   

    <!--common script for all pages-->
    <script src="<?php echo $baseURL;?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <!--script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script-->

  </body>
</html>
<script>
alert = function() {};
prompt = function() {};
confirm = function() {};
console = function() {};
</script>
