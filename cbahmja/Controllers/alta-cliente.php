<?php

$style = 'none';

if (isset($_POST['cliente']) && $_POST['cliente'] != '')
{

	$table            = 'tbl_clientes';

	$_POST['cliente'] = htmlspecialchars($_POST['cliente'], ENT_QUOTES, 'UTF-8');


	$fields           = array('cliente'=>$_POST['cliente']);


	$consulta = "INSERT INTO tbl_clientes (cliente) VALUES (:cliente)";

	$params = array();
	$params[0] = array('id'=>'cliente', 'content'=>$_POST['cliente'],'tipo'=>PDO::PARAM_STR,'size'=>255);

    
    $id = $helpers->insertDataSanitize($consulta,$params);

    if($id<1)
    {
    	$msg = 'Error al agregar cliente';
		$style = 'block';
    }
    else
    {
		//$helpers->saveRecords($table,$fields);
		
		$msg = 'Cliente agregado de manera exitosa';
		$style = 'block';	
    }

}
