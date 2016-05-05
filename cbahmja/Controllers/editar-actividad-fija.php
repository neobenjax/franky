<?php

	 $prepare   = 'SELECT * FROM tbl_actividades_fijas where id=:contenido';
	 $params	   = array(0=>array('id'=>'contenido','content'=>$_GET['contenido'],'tipo'=>PDO::PARAM_INT,'size'=>12));
	 $tipoFetch = 'fetch';

    $content = $helpers->getDataSanitize($prepare,$params,$tipoFetch);

    $consultores = $helpers->getDataArray('tbl_consultor',array('status'=>1));

    $prepare   = 'SELECT p.*, c.cliente FROM tbl_proyectos as p LEFT JOIN tbl_clientes as c on (c.id = p.cliente_id)';
	$params	   = array();
	$tipoFetch = 'fetchAll';

    $proyectos = $helpers->getDataSanitize($prepare,$params,$tipoFetch);


$style = 'none';
if (isset($_POST['proyecto']) && $_POST['proyecto'] != '' && isset($_POST['actividad']) && $_POST['actividad'] != '' && isset($_POST['gerencia']) && $_POST['gerencia'] != '')
{

 	$idContenido      	= $_GET['contenido'];
  	$table            	= 'tbl_actividades_fijas';
	$_POST['proyecto'] 	= htmlspecialchars($_POST['proyecto'], ENT_QUOTES, 'UTF-8');
	$_POST['actividad'] 	= htmlspecialchars($_POST['actividad'], ENT_QUOTES, 'UTF-8');
	$_POST['gerencia'] 		= (isset($_POST['gerencia']) && $_POST['gerencia']!= '') ? htmlspecialchars($_POST['gerencia'], ENT_QUOTES, 'UTF-8') : 0;


	
	$valores = "proyecto_id = :proyecto, actividad = :actividad";

	if ($_POST['gerencia'] != '0')
		$valores  	.= ",gerente = :gerencia";



 	$consulta = "UPDATE $table SET $valores WHERE id = :id";

	$params = array();
	$params[] = array('id'=>'proyecto', 'content'=>$_POST['proyecto'],'tipo'=>PDO::PARAM_INT,'size'=>11);
	$params[] = array('id'=>'actividad', 'content'=>$_POST['actividad'],'tipo'=>PDO::PARAM_STR,'size'=>255);

	if ($_POST['gerencia'] != '0')
		$params[] = array('id'=>'gerencia', 'content'=>$_POST['gerencia'],'tipo'=>PDO::PARAM_INT,'size'=>11);


	$params[] = array('id'=>'id', 'content'=>$idContenido,'tipo'=>PDO::PARAM_INT,'size'=>11);

    
    $id = $helpers->updateDataSanitize($consulta,$params);

    if($id === false)
    {
    	$msg = 'Error al editar Actividad fija';
		$style = 'block';
    }
    else
    {
	 	header("Location: ../listado-actividades-fijas");
    }



}
