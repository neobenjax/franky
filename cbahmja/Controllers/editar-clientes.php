<?php

	 $prepare   = 'SELECT * FROM tbl_clientes where id=:contenido';
	 $params	   = array(0=>array('id'=>'contenido','content'=>$_GET['contenido'],'tipo'=>PDO::PARAM_INT,'size'=>12));
	 $tipoFetch = 'fetch';

    $content = $helpers->getDataSanitize($prepare,$params,$tipoFetch);

$style = 'none';
if (isset($_POST['cliente']) && $_POST['cliente'] != '')
{

 	$idContenido      	= $_GET['contenido'];
  	$table            	= 'tbl_clientes';
	$_POST['cliente'] 	= htmlspecialchars($_POST['cliente'], ENT_QUOTES, 'UTF-8');


 	$consulta = "UPDATE tbl_clientes SET cliente = :cliente WHERE id = :id";

	$params = array();
	$params[0] = array('id'=>'cliente', 'content'=>$_POST['cliente'],'tipo'=>PDO::PARAM_STR,'size'=>255);
	$params[1] = array('id'=>'id', 'content'=>$idContenido,'tipo'=>PDO::PARAM_INT,'size'=>11);

    
    $id = $helpers->updateDataSanitize($consulta,$params);

    if($id === false)
    {
    	$msg = 'Error al editar Cliente';
		$style = 'block';
    }
    else
    {
	 	header("Location: ../listado-clientes");
    }



}
