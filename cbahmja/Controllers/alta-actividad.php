<?php

$style = 'none';

if (isset($_POST['proyecto']) && $_POST['proyecto'] != '' && isset($_POST['actividad']) && $_POST['actividad'] != '' && isset($_POST['etapa']) && $_POST['etapa'] != '')
{

	$table            = 'tbl_actividades';

	$_POST['proyecto'] 		= htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');
	$_POST['actividad'] 	= htmlspecialchars($_POST['actividad'], ENT_QUOTES, 'UTF-8');
	$_POST['etapa'] 		= htmlspecialchars($_POST['etapa'], ENT_QUOTES, 'UTF-8');
	$_POST['html'] 			= (isset($_POST['html']) && $_POST['html']!= '') ? htmlspecialchars($_POST['html'], ENT_QUOTES, 'UTF-8') : 0;
	$_POST['programacion'] 	= (isset($_POST['programacion']) && $_POST['programacion']!= '') ? htmlspecialchars($_POST['programacion'], ENT_QUOTES, 'UTF-8') : 0;
	$_POST['calidad'] 		= (isset($_POST['calidad']) && $_POST['calidad']!= '') ? htmlspecialchars($_POST['calidad'], ENT_QUOTES, 'UTF-8') : 0;

	$campos 				= "proyecto_id, actividad, etapa_id";
	$valor 					= ":proyecto, :actividad, :etapa";

	if ($_POST['html'] != '0')
	{
		$campos 	.= ",consultor_html";
		$valor 		.= ",:html"; 
	}

	if ($_POST['programacion'] != '0')
	{
		$campos 	.= ",consultor_progra";
		$valor 		.= ",:programacion"; 
	}

	if ($_POST['calidad'] != '0')
	{
		$campos 	.= ",consultor_calidad";
		$valor 		.= ",:calidad"; 
	}


	$consulta = "INSERT INTO tbl_actividades ($campos) VALUES ($valor)";

	$params = array();
	$params[] = array('id'=>'proyecto', 'content'=>$_POST['proyecto'],'tipo'=>PDO::PARAM_INT,'size'=>11);
	$params[] = array('id'=>'actividad', 'content'=>$_POST['actividad'],'tipo'=>PDO::PARAM_STR,'size'=>255);
	$params[] = array('id'=>'etapa', 'content'=>$_POST['etapa'],'tipo'=>PDO::PARAM_INT,'size'=>11);

	if ($_POST['html'] != '0')
		$params[] = array('id'=>'html', 'content'=>$_POST['html'],'tipo'=>PDO::PARAM_INT,'size'=>11);

	if ($_POST['programacion'] != '0')
		$params[] = array('id'=>'programacion', 'content'=>$_POST['programacion'],'tipo'=>PDO::PARAM_INT,'size'=>11);

	if ($_POST['calidad'] != '0')
		$params[] = array('id'=>'calidad', 'content'=>$_POST['calidad'],'tipo'=>PDO::PARAM_INT,'size'=>11);


    $id = $helpers->insertDataSanitize($consulta,$params);

    if($id<1)
    {
    	$msg = 'Error al agregar actividad';
		$style = 'block';
    }
    else
    {		
		$msg = 'Actividad agregada de manera exitosa';
		$style = 'block';	
    }

}
