<h4>Vender Producto</h4>
<div class="row">
    <div class="col-sm-4">
        <form id="frmVentasProductos"></form>
        <label>Selecciona Cliente</label>
        <select class="form-control input-sm" id="clienteVenta" name="clienteVenta">
            <option value="A">Selecciona</option>
        </select>
        <label>Producto</label>
        <select class="form-control input-sm" id="productoVenta" name="productoVenta">
            <option value="A">Selecciona</option>
        </select>
        <label>Descripcion</label>
        <textarea id="" name="" class="form-control input-sm"></textarea>

        <label>Cantidad</label>
        <input type="text" class="form-control input-sm" id="" name="">
        <label>Precio</label>
        <input type="text" class="form-control input-sm" id="" name="">
        <p></p>
        <span class="btn btn-primary" id="btnAgregaVenta">Agregar</span>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#clienteVenta').select2();
        $('#productoVenta').select2();
    });

</script>