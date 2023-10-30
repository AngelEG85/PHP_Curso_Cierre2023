<?php require_once "paginas/ParteSuperior.php" ?>

<!-- INICIO DEL CONTENIDO PRINCIPAL -->

<div class="container">
    <div class="row pt-3">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal"><i data-bs-target='#modalCRUD' class="material-icons">Nuevo</i></button>
        </div>
    </div>
</div>
<br>

<div class="container caja">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="contenido">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formProductos">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" class="col-form-label">Producto:</label>
                                <input type="text" class="form-control" name='Producto' id="Producto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" class="col-form-label">Precio</label>
                                <input type="text" class="form-control" name="Precio" id="Precio">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="col-form-label">Cantidad</label>
                                <input type="text" class="form-control" name="Cantidad" id="Cantidad">
                            </div>
                        </div>               
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FINAL DEL CONTENIDO PRINCIPAL -->


<?php require_once "paginas/ParteInferior.php" ?>