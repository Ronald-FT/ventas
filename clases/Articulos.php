<?php 

class articulos{

    private $c;
    private $conexion;
    function __construct() {
        $this->c=new conectar();
        $this->conexion=$this->c->conexion();
    }

    public function agregaImagen($datos){
       

        $fecha=date('Y-m-d');

        $sql="INSERT into imagenes (id_categoria,
                                    nombre,
                                    ruta,
                                    fechaSubida)
                        values ('$datos[0]',
                                '$datos[1]',
                                '$datos[2]',
                                '$fecha')";
        $result=mysqli_query($this->conexion,$sql);

        return mysqli_insert_id($this->conexion);
    }

    

        public function insertaArticulo($datos){
			
			$fecha=date('Y-m-d');

			$sql="INSERT into articulos (id_categoria,
										id_imagen,
										id_usuario,
										nombre,
										descripcion,
										cantidad,
										precio,
										fechaCaptura) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$fecha')";
			return mysqli_query($this->conexion,$sql);
		}

        public function obtenDatosArticulo($idarticulo){

            $sql="SELECT id_producto,
                         id_categoria,
                         nombre,
                         descripcion,
                         cantidad,
                         precio
                    from articulos 
                    where id_producto='$idarticulo'";

                    $result=mysqli_query($this->conexion,$sql);

                    $ver=mysqli_fetch_row($result);

                    $datos=array(

                            "id_producto"=>$ver[0],
                            "id_categoria"=>$ver[1],
                            "nombre"=>$ver[2],
                            "descripcion"=>$ver[3],
                            "cantidad"=>$ver[4],
                            "precio"=>$ver[5]
                                );

                    return $datos;


        }

        public function actualizaArticulo($datos){

			$sql="UPDATE articulos SET id_categoria='$datos[1]', 
										nombre='$datos[2]',
										descripcion='$datos[3]',
										cantidad='$datos[4]',
										precio='$datos[5]'
						WHERE id_producto='$datos[0]'";

			return mysqli_query($this->conexion,$sql);
		}


        public function eliminaArticulo($idarticulo){
			

			$idimagen=self::obtenIdImg($idarticulo);

			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			$result=mysqli_query($this->conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagen($idimagen);

				$sql="DELETE from imagenes 
						where id_imagen='$idimagen'";
				$result=mysqli_query($this->conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}

		public function obtenIdImg($idProducto){
	

			$sql="SELECT id_imagen 
					from articulos 
					where id_producto='$idProducto'";
			$result=mysqli_query($this->conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			
			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";

			$result=mysqli_query($this->conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}



}
