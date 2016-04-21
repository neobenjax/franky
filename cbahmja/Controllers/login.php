<?php
$style = "display:none";

if (isset($_POST['user']) && $_POST['user']!= '' && isset($_POST['pass']) && $_POST['pass']!= '')
{

	//$login = $helpers->getData('tbl_admin',array('usuario[=]'=>$_POST['user']));


	$consulta = "SELECT * FROM tbl_admin WHERE usuario = :usuario";
    $params = array(0 => array('id'=>'usuario', 'content'=>strtolower($_POST['user']),'tipo'=>PDO::PARAM_STR,'size'=>60));

    $login = $helpers->getDataSanitize($consulta,$params,'fetch');

 	if($login === false) {
        $msg = 'Usuario y/o contraseña incorrecta';
        $style = "display:block";
    }
    else
    {
		if (count($login) > 0 && $login['status'] == "1")
		{
			if (md5($_POST['pass']) != $login['password'])
			{
				
				$consulta = "UPDATE tbl_admin SET intentos = intentos + 1 WHERE usuario = :user";

				$params = array();
				$params[0] = array('id'=>'user', 'content'=>$_POST['user'],'tipo'=>PDO::PARAM_STR,'size'=>60);

			    $helpers->updateDataSanitize($consulta,$params);

				//$helpers->database->query("UPDATE tbl_admin SET intentos = intentos + 1 WHERE usuario = '".$_POST['user']."'")->fetchAll();
				//$intentos = $helpers->getQuery("SELECT intentos FROM tbl_admin WHERE usuario='".$_POST['user']."'");
				
				$consulta = "SELECT intentos FROM tbl_admin WHERE usuario = :usuario";
			    $params = array(0 => array('id'=>'usuario', 'content'=>strtolower($_POST['user']),'tipo'=>PDO::PARAM_STR,'size'=>60));

			    $intentos = $helpers->getDataSanitize($consulta,$params,'fetchAll');

				if ($intentos[0]['intentos']>=10)
				{
						$consulta = "UPDATE tbl_admin SET status = 2 WHERE usuario = :user";

						$params = array();
						$params[0] = array('id'=>'user', 'content'=>$_POST['user'],'tipo'=>PDO::PARAM_STR,'size'=>60);

					    $helpers->updateDataSanitize($consulta,$params);

						//$helpers->getQuery("UPDATE tbl_admin SET status = 2 WHERE usuario = '".$_POST['user']."'");
						$msg = 'Usuario bloqueado';
				}
				else
				{
					$msg = 'Usuario y/o contraseña incorrecta';
				}
			}
			else
			{
				$_SESSION['id'] 	= 'admin';
				$_SESSION['rol']  = $login['id_rol'];
				$_SESSION['user_cms'] = $_POST['user'];
				/*$temp 					  = $helpers->getDataArray('tbl_permisos',array());
				$permisos 				= array();

				for($i=0,$n=count($temp);$i<$n;$i++)
					$permisos[$temp[$i]['seccion']] = $temp[$i]['id_rol'];
*/
				$consulta = "UPDATE tbl_admin SET intentos = 0 WHERE usuario = :user";

				$params = array();
				$params[0] = array('id'=>'user', 'content'=>$_POST['user'],'tipo'=>PDO::PARAM_STR,'size'=>60);

			    $helpers->updateDataSanitize($consulta,$params);


				//$helpers->database->query("UPDATE tbl_admin SET intentos = 0 WHERE usuario = '".$_POST['user']."'")->fetchAll();
				$_SESSION['permisos'] = $permisos;

				session_set_cookie_params(0, NULL, NULL, isset($_SERVER["HTTPS"]), TRUE); 
				session_regenerate_id(true);

				header('Location: '.$baseURL.'section/index');
			}
		}
		else if($login['status']=="2")
		{
			$msg = 'Usuario bloqueado';
		}
		else
		{
			$msg = 'Usuario y/o contraseña incorrecta';
		}
		$style = "display:block";
    	
    }
}
?>
