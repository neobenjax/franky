<?php

	 $prepare   = 'SELECT * FROM tbl_proyectos where id=:contenido';
	 $params	   = array(0=>array('id'=>'contenido','content'=>$_GET['contenido'],'tipo'=>PDO::PARAM_INT,'size'=>12));
	 $tipoFetch = 'fetch';

    $content = $helpers->getDataSanitize($prepare,$params,$tipoFetch);

$style = 'none';
if (isset($_POST['cliente']) && $_POST['cliente'] != '' && isset($_POST['proyecto']) && $_POST['proyecto'] != '')
{

 	$idContenido      	= $_GET['contenido'];
  	$table            	= 'tbl_proyectos';
	$_POST['cliente'] 	= htmlspecialchars($_POST['cliente'], ENT_QUOTES, 'UTF-8');
	$_POST['proyecto'] 	= htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');


 	$consulta = "UPDATE $table SET cliente_id = :cliente, proyecto = :proyecto  WHERE id = :id";

	$params = array();
	$params[0] = array('id'=>'cliente', 'content'=>$_POST['cliente'],'tipo'=>PDO::PARAM_INT,'size'=>11);
	$params[1] = array('id'=>'proyecto', 'content'=>$_POST['proyecto'],'tipo'=>PDO::PARAM_STR,'size'=>255);
	$params[2] = array('id'=>'id', 'content'=>$idContenido,'tipo'=>PDO::PARAM_INT,'size'=>11);

    
    $id = $helpers->updateDataSanitize($consulta,$params);

    if($id === false)
    {
    	$msg = 'Error al editar Proyecto';
		$style = 'block';
    }
    else
    {
	 	header("Location: ../listado-proyectos");
    }



}
