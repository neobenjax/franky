<?php

$style = 'none';

if (isset($_POST['cliente']) && $_POST['cliente'] != '' && isset($_POST['proyecto']) && $_POST['proyecto'] != '')
{

	$table            = 'tbl_proyectos';

	$_POST['cliente'] = htmlspecialchars($_POST['cliente'], ENT_QUOTES, 'UTF-8');
	$_POST['proyecto'] = htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');


	$fields           = array('cliente'=>$_POST['cliente'],'proyecto'=>$_POST['proyecto']);


	$consulta = "INSERT INTO tbl_proyectos (cliente_id, proyecto) VALUES (:cliente, :proyecto)";

	$params = array();
	$params[0] = array('id'=>'cliente', 'content'=>$_POST['cliente'],'tipo'=>PDO::PARAM_INT,'size'=>11);
	$params[1] = array('id'=>'proyecto', 'content'=>$_POST['proyecto'],'tipo'=>PDO::PARAM_STR,'size'=>255);

    
    $id = $helpers->insertDataSanitize($consulta,$params);

    if($id<1)
    {
    	$msg = 'Error al agregar proyecto';
		$style = 'block';
    }
    else
    {
		//$helpers->saveRecords($table,$fields);
		
		$msg = 'Proyecto agregado de manera exitosa';
		$style = 'block';	
    }

}
