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
        Crear Invitados
        <small>llena el formulario para añadir un nuevo invitado</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Invitado</h3>
            </div>
            <div class="box-body">
                <!--En el caso cuando tenemos un formulario y queremos subir un archivo necesitamos agregar la propiedad de enctype="multipart/form-data" a nuestro formulario-->
              <form role="form" method="POST" name="guardar-registro" id="guardar-registro-archivo" action="modelo-invitado.php" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                        <label for="nombre_invitado">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido_invitado">Apellido:</label>
                        <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción Invitado</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="8" placeholder="Biografía"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="imagen_invitado">Imágen</label>
                        <input type="file" id="imagen_invitado" name="imagen_invitado">
                        <p class="help-block">Añada la imágen del invitado aquí.</p>
                    </div>
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

