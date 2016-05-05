<?php

$act = '';


if (isset($_POST['act']) && $_POST['act']!= '')
	$act = $_POST['act'];

$style = 'none';



if ($act == 'updActividad' && isset($_POST['actv']) && $_POST['actv']!= '' && isset($_POST['status']) && $_POST['status']!= '')
{
	$_POST['actv'] = htmlspecialchars($_POST['actv'], ENT_QUOTES, 'UTF-8');
	$_POST['status'] = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

	$consulta = "UPDATE tbl_actividades_fijas set STATUS = IF(1 = :status, 0, 1 ) where id = :id";

    $params = array(0 => array('id'=>'status', 'content'=>$_POST['status'],'tipo'=>PDO::PARAM_INT,'size'=>12),1 => array('id'=>'id', 'content'=>$_POST['actv'],'tipo'=>PDO::PARAM_INT,'size'=>12));

    $delBlog = $helpers->updateDataSanitize($consulta,$params);


    if($delBlog === false){
        $msg = '<strong>Aviso: </strong>Error al desactivar actividad fija.';
  		$style = 'block';
    }

	if ($delBlog > 0)
	{
		header("Location: listado-actividades-fijas");
		die();
	}

	$msg = '<strong>Aviso: </strong>Error al desactivar actividad fija.';
  	$style = 'block';

}

elseif ($act == 'compActividad' && isset($_POST['actv']) && $_POST['actv']!= '' && isset($_POST['completado']) && $_POST['completado']!= '')
{
	$_POST['actv'] = htmlspecialchars($_POST['actv'], ENT_QUOTES, 'UTF-8');
	$_POST['status'] = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

	$consulta = "UPDATE tbl_actividades_fijas set completado = IF(1 = :completado, 0, 1 ), fecha_completado = NOW() where id = :id";

    $params = array(0 => array('id'=>'completado', 'content'=>$_POST['completado'],'tipo'=>PDO::PARAM_INT,'size'=>12),1 => array('id'=>'id', 'content'=>$_POST['actv'],'tipo'=>PDO::PARAM_INT,'size'=>12));

    $delBlog = $helpers->updateDataSanitize($consulta,$params);


    if($delBlog === false){
        $msg = '<strong>Aviso: </strong>Error al completar actividad fija.';
  		$style = 'block';
    }

	if ($delBlog > 0)
	{
		header("Location: listado-actividades-fijas");
		die();
	}

	$msg = '<strong>Aviso: </strong>Error al completar actividad fija.';
  	$style = 'block';

}




?>