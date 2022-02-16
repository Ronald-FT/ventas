<?php

require_once "clases/Conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT * FROM usuarios WHERE email='admin'";
$result=mysqli_query($conexion,$sql);
$validar=0;
if (mysqli_num_rows($result)>0) {
    $validar=1;
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Usuario</title>
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
</head>
<body style="background-color: gray">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 "></div>
            <div class="col-sm-4 ">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">Sistema de venta y almacen</div>
                <div class="panel panel-body">
                    <p>
                        <img src="img/ventas.jpeg"  height="190px" width="300px">
                    </p>
                    <form id="formLogin">
                    <label> Usuario</label>
                        <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                        <label >Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control input-sm" >
                        <p></p>
                        <span class="btn btn-primary btn-small" id="entrarSistema">Entrar</span>
                       <?php if (!$validar):?> <!-- validar boton php -->
                        <a href="registro.php" class="btn btn-danger btn-small">Registrarse</a>
                       <?php endif;?><!-- fin de la validacion -->
                    </form>
                    
                </div>
 
                </div>
            </div>
            <div class="col-sm-4 "></div>
    </div>
</body>
</html>
<script type="text/javascript">

$(document).ready(function(){

	$('#entrarSistema').click(function(){
        vacios=validarFormVacio('formLogin');
        if (vacios >0) {
            alert("faltan campos por llenar")
            return false;
        }



datos=$('#formLogin').serialize();
$.ajax({
    type:"POST",
    data:datos,
    url:"/procesos/regLogin/login.php",
    success:function(r){

        if (r==1) {
            window.location="vistas/inicio.php";
        }else{
            alert("No se pudo acceder");
        }
    }
});
});
});
</script>