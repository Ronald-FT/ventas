<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Usuarios.php";


$obj= new usuarios;

$_POST['idusuario'];

echo json_encode($obj->obtenDatosUsuarios($_POST['idusuario']));


?>