<?php

class usuarios{
    private $c;
    private $conexion;
    function __construct() {
        $this->c=new conectar();
        $this->conexion=$this->c->conexion();
    }
    public function registroUsuario($datos){
      

        $fecha=date('Y-m-d');

        $sql="INSERT into usuarios (nombre,
                            apellido,
                            email,
                            pass,
                            fechaCaptura)
                    values ('$datos[0]',
                            '$datos[1]',
                            '$datos[2]',
                            '$datos[3]',
                            '$fecha')";
        return mysqli_query($this->conexion,$sql);
    }

    public function loginUser($datos){
  
        $password=sha1($datos[1]);

        $_SESSION['usuario']=$datos[0];
        $_SESSION['iduser']=self::traeID($datos);

        $sql="SELECT * FROM usuarios
                       where email='$datos[0]' and pass='$password'";
      
        $result=mysqli_query($this->conexion,$sql) or mysqli_error($this->conexion);

        if (mysqli_num_rows($result) > 0) {
            return 1;
        }else{
            return 0;
        }

    }
    public function traeID($datos){
        $password=sha1($datos[1]);

        $sql="SELECT id_usuario from usuarios where email='$datos[0]' and pass='$password'";

        $result=mysqli_query($this->conexion,$sql) or mysqli_error($this->conexion);

        return mysqli_fetch_row($result)[0];
    }

    public function obtenDatosUsuarios($idusuario){

        $sql="SELECT id_usuario,
                    nombre,
                    apellido,
                    email
                    FROM usuarios 
                    WHERE id_usuario='$idusuario'";

            $result= mysqli_query($this->conexion,$sql);

            $ver=mysqli_fetch_row($result);

            $datos=array('id_usuario'=>$ver[0],
                            'nombre'=>$ver[1],
                            'apellido'=>$ver[2],
                            'email'=>$ver[3]
                        );

            return $datos;  

    }

    public function actualizaUsuario($datos){

        $sql="UPDATE usuarios SET  nombre='$datos[1]',
                                   apellido='$datos[2]',
                                   email='$datos[3]'
                              WHERE id_usuario='$datos[0]'";

              return mysqli_query($this->conexion,$sql);              



    }

    public function eliminarUsuario($idusuario){

        $sql="DELETE FROM usuarios 
                     WHERE id_usuario='$idusuario'";

                return mysqli_query($this->conexion,$sql);



    }
    
}

?>
