
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Argentina Programa 2023</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!--Modal para Busqueda Entre Fechas-->
<div class="modal fade" id="modalxFECHA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title text-center" id="exampleModalLabel">Exportar movimiento entre fechas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="form" action="Logica/reporte.php">
        <div class="modal-body">
          <form id="formExportarxFecha">
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="" class="col-form-label">Fecha Inicial:</label>
                    <input type="datetime-local" class="form-control" id="FInicio" name="Inicio">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="" class="col-form-label">Fecha Final</label>
                    <input type="datetime-local" class="form-control" id="FFinal" name="Final">
                  </div>
                </div>
              </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="btnExportarxFecha" name="generar_reporte" class="btn btn-success">Exportar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <--Modal para Busqueda Entre Fechas--> 

<!-- Cerrar Sesion Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.PHP">Logout</a>
      </div>
    </div>
  </div>
</div>

<?php require_once "scripts.php";  ?>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



<script>
  $(document).ready(function() {
    console.log("la app esta funcionando desde parte inferior");

    $(document).on('click', '.editarPersona', function() {
      let elemento = $(this)[0].parentElement.parentElement;
      let dni = $(elemento).attr('dni');
      console.log(dni);

    })

    getProductos();

    function getProductos() {
        var url = 'http://localhost/apirest_php/api/productos';

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);
                var productos = respuesta.results; // Ajusta según la estructura de tu API
                if (productos && productos.length > 0) {
                    $.each(productos, function(i, prod) {
                        var btnEditar = "<button class='btn btn-primary btn-sm btnEditar'>Editar</button>";
                        var btnBorrar = "<button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button>";
                        $('#contenido').append('<tr><td>' + prod.id + '</td><td>' + prod.nombre + '</td><td>' + prod.precio + '</td><td>' + prod.cantidad + '</td><td>' + btnEditar + btnBorrar + '</td></tr>');
                    });
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }


    

  });
</script>




</body>

</html>