<?php

class clientes{

    function __construct() {
        $this->c=new conectar();
        $this->conexion=$this->c->conexion();
    }

    public function agregaCLiente($datos){

        $idusuario=$_SESSION['iduser'];

        $sql="INSERT INTO clientes (id_usuario,
                                    nombre,
                                    apellido,
                                    direccion,
                                    email,
                                    telefono,
                                    rut) 
                                    values ('$idusuario',
                                            '$datos[0]',
                                            '$datos[1]',
                                            '$datos[2]',
                                            '$datos[3]',
                                            '$datos[4]',
                                            '$datos[5]')";
        return mysqli_query($this->conexion,$sql);                                 
    }

} 

?>