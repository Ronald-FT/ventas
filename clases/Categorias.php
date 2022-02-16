<?php 

class categorias{

    function __construct() {
        $this->c=new conectar();
        $this->conexion=$this->c->conexion();
    }
    public function agregaCategoria($datos){

        $sql="INSERT INTO categorias(id_usuario,
                                     nombreCategoria,
                                     fechaCaptura)
                     values('$datos[0]',
                            '$datos[1]',
                            '$datos[2]')";

        return mysqli_query($this->conexion,$sql);
    }

    public function actualizaCategoria($datos){


        $sql="UPDATE categorias set nombreCategoria='$datos[1]' WHERE id_categoria='$datos[0]'";

        echo mysqli_query($this->conexion,$sql);
    }


    public function eliminaCategoria($idcategoria){

    $sql="DELETE FROM categorias WHERE id_categoria='$idcategoria'";

    return mysqli_query($this->conexion,$sql);

    }
}
