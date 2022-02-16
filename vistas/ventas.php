<?php

session_start();
if (isset($_SESSION['usuario'])) {



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ventas</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>

        <div class="container">
            <h1>Venta de productos</h1>
            <div class="row">
                <div class="col-sm-12">
                    <span class="btn btn-default" id="ventaProductosBtn">Vender Producto</span>
                    <span class="btn btn-default" id="ventasHechasBtn">Ventas hechas</span>
                </div>
            </div>
            <div class="row">
                <divc class="col-sm-12">
                    <div id="ventaProductos"></div>
                    <div id="ventasHechas"></div>
            </div>
        </div>
        </div>


    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#ventaProductosBtn').click(function() {
                esconderSeccion();
                $('#ventaProductos').load('ventas/ventaDeProducto.php');    
                $('#ventaProductos').show();
            });
            $('#ventasHechasBtn').click(function() {
                esconderSeccion();
                $('#ventasHechas').load('ventas/ventasyreportes.php');
                $('#ventasHechas').show();
            });


        });

        function esconderSeccion(){
            $('#ventaProductos').hide();
            $('#ventasHechas').hide();
        }
    </script>

<?php

} else {
    header("location:../index.php");
}
?>