<?php

$act = '';


if (isset($_POST['act']) && $_POST['act']!= '')
	$act = $_POST['act'];

$style = 'none';



if ($act == 'updCliente' && isset($_POST['cli']) && $_POST['cli']!= '' && isset($_POST['status']) && $_POST['status']!= '')
{
	$_POST['cli'] = htmlspecialchars($_POST['cli'], ENT_QUOTES, 'UTF-8');
	$_POST['status'] = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

	$consulta = "UPDATE tbl_clientes set STATUS = IF(1 = :status, 0, 1 ) where id = :id";

    $params = array(0 => array('id'=>'status', 'content'=>$_POST['status'],'tipo'=>PDO::PARAM_INT,'size'=>12),1 => array('id'=>'id', 'content'=>$_POST['cli'],'tipo'=>PDO::PARAM_INT,'size'=>12));

    $delBlog = $helpers->updateDataSanitize($consulta,$params);


    if($delBlog === false){
        $msg = '<strong>Aviso: </strong>Error al desactivar cliente.';
  		$style = 'block';
    }

	if ($delBlog > 0)
	{
		header("Location: listado-clientes");
		die();
	}

	$msg = '<strong>Aviso: </strong>Error al desactivar cliente.';
  	$style = 'block';

}




?>