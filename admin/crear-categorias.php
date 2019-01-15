<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Categorías de Eventos
        <small>llena el formulario para crear una categoría de eventos</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categoría</h3>
            </div>
            <div class="box-body">
              <form role="form" method="POST" name="guardar-registro" id="guardar-registro" action="modelo-categoria.php">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="categoria">Nombre Categoría:</label>
                      <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría">
                    </div>
                    <div class="form-group">
                      <label for="icono">Icono:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class=""></i>
                        </div>
                        <input type="text" name="icono" id="icono" class="form-control pull-right" placeholder="fa-icon">
                      </div>
                    </div> <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="registro" value="crear">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                  </div>
                </form> 
            </div> <!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div>
    </div>
  </div><!-- /.content-wrapper -->

<?php 
include_once 'templates/footer.php';
?>

