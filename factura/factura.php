<!doctype html>
<html lang="es">

<head>
  <title>Facturación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../">Tecnologias Web</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

  <div class="container">
    <div class="row mt-4">
      <div class="col-md">
      <div align="center" >
    <img src="logo.jpg" align="center" >
  </div><!--.logoholder-->

  <div class="me" align="center">
    <p content>
    <H2><strong>Guate Store</strong></H2><br>
      <H4>Universidad San Pablo de Guatemala<br></H4>
      <H5>Zona 14, Guatemala, Guatemala<br>
       Web: www.apiguatestore.com<br>
      E-mail: info@guatestore.com</H5>
          </p>
  </div><!--.me-->

        <div class="form-group row">
          <label for="CodigoFactura" class="col-lg-3 col-form-label">Número de factura:</label>
          <div class="col-lg-3">
            <input type="text" disabled class="form-control" id="CodigoFactura" value="">
          </div>
        </div>


        <div class="form-group row">
          <label for="Fecha" class="col-lg-3 col-form-label">Fecha de emisión:</label>
          <div class="col-lg-3">
            <input type="date" name="fecha" class="form-control" id="fecha">
          </div>
          <label for="Nit" class="col-lg-3 col-form-label">Número de Nit:</label>
          <div class="col-lg-3">
            <input type="" name="nit" class="form-control" id="nit">
          </div>
        </div>

        <div class="form-group row">
          <label for="Cliente" class="col-lg-3 col-form-label">Cliente:</label>
          <div class="col-lg-3">
          <input type="" name="cliente" class="form-control" id="cliente">
          </div>
          <label for="CodigoCliente" class="col-lg-3 col-form-label">Dirección Comercial:</label>
          <div class="col-lg-3">
          <input type="" name="direccion" class="form-control" id="direccion">
          </div>
        </div>

        <div class="form-group row">
          <label for="Cliente" class="col-lg-3 col-form-label">Monto:</label>
          <div class="col-lg-3">
          <input type="text" disabled class="form-control SumTotal" id="montofactura" value="">
          </div>
        </div>


      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código de Artículo</th>
              <th>Descripción</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Precio Unitario</th>
              <th class="text-right Total">Total</th>
            </tr>
          </thead>
          <tbody id="DetalleFactura">

          </tbody>
        </table>
        <button type="button" id="btnAgregarProducto" class="btn btn-success">Agregar Producto</button>
        <button type="button" id="btnGrabar" class="btn btn-success">Grabar Factura</button>
        <button type="button" class="btn btn-outline-primary"><a href="javascript:window.print()">Imprimir</a></button>
      </div>
    </div>

  </div>



  <!-- ModalProducto(Agregar) -->
  <div class="modal fade" id="ModalProducto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label>Codigo:</label>
                <input type="" name="codigo" class="form-control" id="codigo">
                <label>Descripción:</label>
                <input type="" name="descripcion" class="form-control" id="descripcion">
                <label>cantidad:</label>
                <input type="" name="cantidad" class="form-control" id="cantidad">
                <label>Precio Unitario:</label>
                <input type="" name="valor_unitario" class="form-control" id="valor_unitario">
            </div>
            <div class="form-group">
               
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" id="btnConfirmarAgregarProducto" class="btn btn-success">Agregar a la factura</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>
  </div>




  <script src="factura.js"> </script>
  

</body>

</html>