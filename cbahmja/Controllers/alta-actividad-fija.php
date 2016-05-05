<?php

$style = 'none';

	$prepare   = 'SELECT p.*, c.cliente FROM tbl_proyectos as p LEFT JOIN tbl_clientes as c on (c.id = p.cliente_id)';
	$params	   = array();
	$tipoFetch = 'fetchAll';

    $proyectos = $helpers->getDataSanitize($prepare,$params,$tipoFetch);

if (isset($_POST['proyecto']) && $_POST['proyecto'] != '' && isset($_POST['actividad']) && $_POST['actividad'] != '' && isset($_POST['gerencia']) && $_POST['gerencia'] != '')
{

	$table            = 'tbl_actividades_fijas';

	$_POST['proyecto'] 		= htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');
	$_POST['actividad'] 	= htmlspecialchars($_POST['actividad'], ENT_QUOTES, 'UTF-8');
	$_POST['gerencia'] 		= (isset($_POST['gerencia']) && $_POST['gerencia']!= '') ? htmlspecialchars($_POST['gerencia'], ENT_QUOTES, 'UTF-8') : 0;

	$campos 				= "proyecto_id, actividad";
	$valor 					= ":proyecto, :actividad";

	if ($_POST['gerencia'] != '0')
	{
		$campos 	.= ",gerente";
		$valor 		.= ",:gerencia"; 
	}


	$consulta = "INSERT INTO tbl_actividades_fijas ($campos) VALUES ($valor)";

	$params = array();
	$params[] = array('id'=>'proyecto', 'content'=>$_POST['proyecto'],'tipo'=>PDO::PARAM_INT,'size'=>11);
	$params[] = array('id'=>'actividad', 'content'=>$_POST['actividad'],'tipo'=>PDO::PARAM_STR,'size'=>255);

	if ($_POST['gerencia'] != '0')
		$params[] = array('id'=>'gerencia', 'content'=>$_POST['gerencia'],'tipo'=>PDO::PARAM_INT,'size'=>11);


    $id = $helpers->insertDataSanitize($consulta,$params);

    if($id<1)
    {
    	$msg = 'Error al agregar actividad fija';
		$style = 'block';
    }
    else
    {		
		$msg = 'Actividad Fija agregada de manera exitosa';
		$style = 'block';	
    }

}
