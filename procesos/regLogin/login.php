<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios();

    $datos=array($_REQUEST['usuario'],
                 $_REQUEST['password']);

	

	echo $obj->loginUser($datos);

 