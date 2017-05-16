<?php
require 'conn.php';
require 'class.phpmailer.php';
include_once 'medoo.php';
include_once 'PhpConsole/__autoload.php';



class Helpers
{

 public $database;
 public $handlerHelper;

 public function __construct()
 {

  $this->handlerHelper = PhpConsole\Handler::getInstance();
  
  if(defined('DATABASE_NAME') && DATABASE_NAME!='' && defined('SERVER') && SERVER!='' && defined('USERNAME') && USERNAME!='' && defined('PASSWORD') && PASSWORD!=''){

    $this->database = new medoo(array(
     'database_type' => 'mysql',
     'database_name' => DATABASE_NAME,
     'server' => SERVER,
     'username' => USERNAME,
     'password' => PASSWORD,
     'charset' => 'utf8'
     ));

  }

}

public function getDBInfo(){
  return $this->database->info();
}

   # ---------------
   # HELPERS get
   # ---------------
public function getView($view)
{
  $viewSan = filter_var($view, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  if(!file_exists('Views/'.$viewSan.'.php'))
    $returnView = 'Views/404.php';
  else
    $returnView = 'Views/'.$viewSan.".php";

  return $returnView;

}

public function getController($controller)
{
  $controllerSan = filter_var($controller, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  if(!file_exists('Controllers/'.$controllerSan.'.php'))
    $returnController = 'Controllers/404.php';
  else
    $returnController = 'Controllers/'.$controllerSan.".php";

  return $returnController;
}

public function getJs($librerias, $js, $seccion)
{
  $jsSan = filter_var($js, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  $secSan = filter_var($seccion, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  $url = $this->getURL();
  $returnJs = '';

  if(isset($librerias[$jsSan][$secSan]) && count($librerias[$jsSan][$secSan])>0)
  {

    for($i=0,$n=count($librerias[$jsSan][$secSan]);$i<$n;$i++)
    {
      if(file_exists($librerias[$jsSan][$secSan][$i]))
       $returnJs .= '<script type="text/javascript" src="'.$url.$librerias[$jsSan][$secSan][$i].'"></script>';  
   }

 }

 print $returnJs; 
}

public function getURL()
{

        //Variables de directorios
  $http = (isset($_SERVER['HTTPS'])) ? 'https' : 'http';
  $actual_link = "$http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $directorio = dirname($_SERVER["PHP_SELF"]);
  $directorio =($directorio!='')?$directorio:'/';
  $path = "$http://$_SERVER[HTTP_HOST]";
  $fullPath = $path.$directorio;
  $fullPath = ($fullPath[strlen($fullPath)-1]=='/')?$fullPath:$fullPath.'/';

  $_SESSION['baseURL'] = $fullPath;

  return $fullPath;
}

public function checkUser($uid, $oauth_provider, $username,$email,$twitter_otoken,$twitter_otoken_secret)
{
  if ($email != '')
    $query = $this->getQuery("SELECT * FROM tbl_usuario WHERE (oauth_uid = '$uid' and oauth_provider = '$oauth_provider') or email = '$email'");
  else
    $query = $this->getQuery("SELECT * FROM tbl_usuario WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");


  if (count($query)>0)
  {
    if ($query[0]['id']!='' && $query[0]['nombre']!='' && $query[0]['apellido']!='' && $query[0]['fecha_nacimiento']!=''
     && $query[0]['genero']!=''  && $query[0]['estado']!=''  && $query[0]['email']!=''  && $query[0]['password']!='')
    {
      $query[0]['registrado'] = 1;
      return $query;
    }
  }

  $query[0]['registrado'] = 0;
  return $query;
}


/****************************************************    ADMIN    ************************************************/

public function tienePermiso($seccion)
{
  if (isset($_SESSION['permisos'][$seccion]) )
  {
    if ($_SESSION['rol'] <= $_SESSION['permisos'][$seccion])
      return 1;
  }

  return 0;

}


public function getStatus($status)
{
  if($status==1)
    return 'Activo';
  else
    return 'Inactivo';
}


    # -----------------------
    # HELPERS image
    # -----------------------

public function savePhoto(&$file,$folder)
{

  $filepath = '../assets/'.$folder.'/'.$file['name'];
  $new_filename = $filepath;
  $nameFile = $file['name'];

  if (file_exists('../assets/'.$folder.'/'.$file['name']))
  {
    $temp = explode(".", $file['name']);
    $fileName = '';

    for($i = 0; $i < sizeof($temp) - 1; $i++)
      $fileName .= $temp[$i];


    for ($i = 1; $i < 100; $i++)
    {
      if ( ! file_exists('../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1]))
      {
        $new_filename = '../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1];
        $file['name'] = $fileName.$i.'.'.$temp[sizeof($temp) - 1];
        break;
      }
    }
  }

  if (copy($file['tmp_name'],$new_filename)) {
    $type = pathinfo($new_filename, PATHINFO_EXTENSION);
    $data = file_get_contents($new_filename);
    return true;
  }
  else
  {
            #echo '<aside>Error al subir imagen, intente de nuevo.</aside>';
    return false;
  }

}


public function savePhotoEditor(&$file,$folder)
{

  $filepath = '../../assets/'.$folder.'/'.$file['name'];
  $new_filename = $filepath;
  $nameFile = $file['name'];

  if (file_exists('../../assets/'.$folder.'/'.$file['name']))
  {
    $temp = explode(".", $file['name']);
    $fileName = '';

    for($i = 0; $i < sizeof($temp) - 1; $i++)
      $fileName .= $temp[$i];


    for ($i = 1; $i < 100; $i++)
    {
      if ( ! file_exists('../../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1]))
      {
        $new_filename = '../../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1];
        $file['name'] = $fileName.$i.'.'.$temp[sizeof($temp) - 1];
        break;
      }
    }
  }

  if (copy($file['tmp_name'],$new_filename)) {
    $type = pathinfo($new_filename, PATHINFO_EXTENSION);
    $data = file_get_contents($new_filename);
    return true;
  }
  else
  {
            #echo '<aside>Error al subir imagen, intente de nuevo.</aside>';
    return false;
  }

}


public function saveMultiplePhoto(&$file,$k,$folder)
{

  $filepath = '../assets/'.$folder.'/'.$file['name'][$k];
  $new_filename = $filepath;
  $nameFile = $file['name'][$k];

  if (file_exists('../assets/'.$folder.'/'.$file['name'][$k]))
  {
    $temp = explode(".", $file['name'][$k]);
    $fileName = '';

    for($i = 0; $i < sizeof($temp) - 1; $i++)
      $fileName .= $temp[$i];


    for ($i = 1; $i < 100; $i++)
    {
      if ( ! file_exists('../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1]))
      {
        $new_filename = '../assets/'.$folder.'/'.$fileName.$i.'.'.$temp[sizeof($temp) - 1];
        $file['name'][$k] = $fileName.$i.'.'.$temp[sizeof($temp) - 1];
        break;
      }

    }
  }

  if (copy($file['tmp_name'][$k],$new_filename)) {
    $type = pathinfo($new_filename, PATHINFO_EXTENSION);
    $data = file_get_contents($new_filename);
    return true;
  }
  else
  {
            #echo '<aside>Error al subir imagen, intente de nuevo.</aside>';
    return false;
  }
}


public function thumbnail($file, $name, $folder_s, $folder_d, $nw, $nh)
{
        $source = '../../assets/'.$folder_s.'/'.$file['name'];    //Source file
        $dest = '../../assets/'.$folder_d.'/'.$name;


        $size = getimagesize($source);
        $w = $size[0];    //Images width
        $h = $size[1];    //Images height

        $img = strtolower($file['name']);
        $ext = pathinfo($img, PATHINFO_EXTENSION);

        $posp1 = strpos($ext, 'png');

        if ($posp1 !== false)
          $simg = imagecreatefrompng($source);
        else
          $simg = imagecreatefromjpeg($source);


        $dimg = imagecreatetruecolor($nw, $nh);

        $color = imagecolorallocate($dimg, 255, 255, 255);

        // fill entire image
        imagefill($dimg, 0, 0, $color);

        $ratio = $w * 1.0 / $h;

        $w_undersized = ($w > $nw);
        $h_undersized = ($h > $nh);

        if ($w_undersized OR $h_undersized)
        {
          $new_w = round( min($nw, $ratio * $nh) );
          $new_h = round( min($nh, $nw / $ratio) );
          $moveH = 0;
          $moveW = 0;

          if( $new_h < $nh)
            $moveH = ($nh - $new_h)/2;

          if( $new_w < $nw)
            $moveW = ($nw - $new_w)/2;

          imagecopyresampled($dimg,$simg,$moveW,$moveH,0,0,$new_w,$new_h,$w,$h);
        }
        else
        {
          imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
        }

        imagejpeg($dimg, $dest);

      }


      public function validImage($file,$w,$h)
      {
        $dimen1   = getimagesize($file['tmp_name']);

        if (count($dimen1)>0)
        {
          if (isset($dimen1[0]) && isset($dimen1[1]))
          {
            if (!($dimen1[0]>=$w &&  $dimen1[1]>=$h))
              return 0;

          }
          else
            return 0;
        }
        else
          return 0;


        return 1;
      }

      public function validMultipleImage($file,$w,$h)
      {
        $dimen1   = getimagesize($file);

        if (count($dimen1)>0)
        {
          if (isset($dimen1[0]) && isset($dimen1[1]))
          {
            if (!($dimen1[0]>=$w &&  $dimen1[1]>=$h))
              return 0;

          }
          else
            return 0;
        }
        else
          return 0;


        return 1;
      }


      /**************************************** TOOLS COMUN   ****************************************************/


      public function getOptionsWhere($table,$field_name,$where)
      {
        $options = $this->database->select($table,'*',$where);
        foreach ($options as $option)
        {
          echo '<option value="'.$option['id'].'">'.$option[$field_name].'</option>';
        }
      }


      public function getOptionsSelect($table,$field_name,$opt_selected)
      {
        $options = $this->database->select($table,'*',array('status'=>1));
        foreach ($options as $option)
        {
          $selected = '';

          if ($opt_selected == $option['id']) $selected = 'selected';

          echo '<option value="'.$option['id'].'" '.$selected.'>'.$option[$field_name].'</option>';
        }
      }



    # -----------------------
    # HELPERS emails
    # -----------------------

      public function sentEmail($subject,$message,$to)
      {
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->IsHTML(true);
        $mailer->CharSet = 'UTF-8';
        $mailer->Host = "mail.codice.com";
        $mailer->From = "";
        $mailer->FromName = "";
        $mailer->Username = "";
        $mailer->Password = "";

        $mailer->Body = $message;
        $mailer->Subject = $subject;

        for($i=0,$n=count($to);$i<$n;$i++)
          $mailer->AddAddress($to[$i]);

        $mailer->Send();
      }


    # -----------------------
    # HELPERS select /queries
    # -----------------------

      public function getDataSanitize($prepare,$params,$tipoFetch,$console)
      {
        $startquerytime = microtime(true);

        $sth = $this->database->pdo->prepare($prepare);

        for($i=0,$n=count($params);$i<$n;$i++)
        {
          if(!$sth->bindParam(':'.$params[$i]['id'], $params[$i]['content'], $params[$i]['tipo'],$params[$i]['size']))
            return false;
        }
        if($sth->execute()){
          if ($tipoFetch == 'fetch')
            $result = $sth->fetch(PDO::FETCH_ASSOC);
          else if ($tipoFetch == 'fetchAll')
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          else
            return false;
        }
        else
          return false;


        if($result === false)
          return false;

        $endquerytime = microtime(true);
        $durationqry = $endquerytime - $startquerytime;

        if($console){
          $this->handlerHelper->debug($prepare, 'Prepare Qry:');
          $this->handlerHelper->debug($params, 'Params:');
          $this->handlerHelper->debug($durationqry, 'Tiempo consulta select (ms)');
        }

        return $result;
      }


      public function insertDataSanitize($prepare,$params,$console)
      {
        $startquerytime = microtime(true);

        $sth = $this->database->pdo->prepare($prepare);

        for($i=0,$n=count($params);$i<$n;$i++)
        {
          if(!$sth->bindParam(':'.$params[$i]['id'], $params[$i]['content'], $params[$i]['tipo'],$params[$i]['size']))
            return 0;
        }
        
        if($sth->execute() && $sth->rowCount() > 0){
          
          $endquerytime = microtime(true);
          $durationqry = $endquerytime - $startquerytime;

          if($console){
            $this->handlerHelper->debug($prepare, 'Prepare Qry:');
            $this->handlerHelper->debug($params, 'Params:');
            $this->handlerHelper->debug($durationqry, 'Tiempo consulta Insert (ms)');
          }

          return $this->database->pdo->lastInsertId();
        }
        else
          return 0;


      }

      public function updateDataSanitize($prepare,$params,$console)
      {
        $startquerytime = microtime(true);

        $sth = $this->database->pdo->prepare($prepare);

        for($i=0,$n=count($params);$i<$n;$i++)
        {
          if(!$sth->bindParam(':'.$params[$i]['id'], $params[$i]['content'], $params[$i]['tipo'],$params[$i]['size']))
            return false;
        }
        
        if($sth->execute()){
          
          $endquerytime = microtime(true);
          $durationqry = $endquerytime - $startquerytime;

          if($console){
            $this->handlerHelper->debug($prepare, 'Prepare Qry:');
            $this->handlerHelper->debug($params, 'Params:');
            $this->handlerHelper->debug($durationqry, 'Tiempo consulta Update (ms)');
          }

          return true;
        }
        else
          return false;


      }

      public function getTestData(){
        return "Pollo";
      }

    }