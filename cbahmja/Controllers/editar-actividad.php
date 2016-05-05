<?php

	 $prepare   = 'SELECT * FROM tbl_actividades where id=:contenido';
	 $params	   = array(0=>array('id'=>'contenido','content'=>$_GET['contenido'],'tipo'=>PDO::PARAM_INT,'size'=>12));
	 $tipoFetch = 'fetch';

    $content = $helpers->getDataSanitize($prepare,$params,$tipoFetch);

    $consultores = $helpers->getDataArray('tbl_consultor',array('status'=>1));


    $prepare   = 'SELECT p.*, c.cliente FROM tbl_proyectos as p LEFT JOIN tbl_clientes as c on (c.id = p.cliente_id)';
	$params	   = array();
	$tipoFetch = 'fetchAll';

    $proyectos = $helpers->getDataSanitize($prepare,$params,$tipoFetch);


$style = 'none';
if (isset($_POST['proyecto']) && $_POST['proyecto'] != '' && isset($_POST['actividad']) && $_POST['actividad'] != '' && isset($_POST['etapa']) && $_POST['etapa'] != '')
{

 	$idContenido      	= $_GET['contenido'];
  	$table            	= 'tbl_actividades';
	$_POST['proyecto'] 	= htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');
	$_POST['actividad'] 	= htmlspecialchars($_POST['actividad'], ENT_QUOTES, 'UTF-8');
	$_POST['etapa'] 	= htmlspecialchars($_POST['etapa'], ENT_QUOTES, 'UTF-8');
	$_POST['html'] 			= (isset($_POST['html']) && $_POST['html']!= '') ? htmlspecialchars($_POST['html'], ENT_QUOTES, 'UTF-8') : 0;
	$_POST['programacion'] 	= (isset($_POST['programacion']) && $_POST['programacion']!= '') ? htmlspecialchars($_POST['programacion'], ENT_QUOTES, 'UTF-8') : 0;
	$_POST['calidad'] 		= (isset($_POST['calidad']) && $_POST['calidad']!= '') ? htmlspecialchars($_POST['calidad'], ENT_QUOTES, 'UTF-8') : 0;
	$_POST['gerencia'] 		= (isset($_POST['gerencia']) && $_POST['gerencia']!= '') ? htmlspecialchars($_POST['gerencia'], ENT_QUOTES, 'UTF-8') : 0;


	
	$valores = "proyecto_id = :proyecto, actividad = :actividad, etapa_id = :etapa";

	if ($_POST['html'] != '0')
		$valores  	.= ",consultor_html = :html";

	if ($_POST['programacion'] != '0')
		$valores  	.= ",consultor_progra = :programacion";

	if ($_POST['calidad'] != '0')
		$valores  	.= ",consultor_calidad = :calidad";

	if ($_POST['gerencia'] != '0')
		$valores  	.= ",gerente = :gerencia";



 	$consulta = "UPDATE $table SET $valores WHERE id = :id";

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

	if ($_POST['gerencia'] != '0')
		$params[] = array('id'=>'gerencia', 'content'=>$_POST['gerencia'],'tipo'=>PDO::PARAM_INT,'size'=>11);


	$params[] = array('id'=>'id', 'content'=>$idContenido,'tipo'=>PDO::PARAM_INT,'size'=>11);

    
    $id = $helpers->updateDataSanitize($consulta,$params);

    if($id === false)
    {
    	$msg = 'Error al editar Actividad';
		$style = 'block';
    }
    else
    {
	 	header("Location: ../listado-actividades");
    }



}
