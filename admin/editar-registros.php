<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';

  $id = $_GET['id'];

  if(!filter_var($id, FILTER_VALIDATE_INT)){
      die("Error");
  }

  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Registro de Usuario
        <small>edita un registro manualmente</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Registro</h3>
            </div>
            <div class="box-body">
            <?php 
                $sql = "SELECT * FROM registrados WHERE id_registrado=$id";
                $resultado = $conn->query($sql);
                $registrado = $resultado->fetch_assoc();
            ?>

                <form class="editar-registrado" role="form" method="POST" name="guardar-registro" id="guardar-registro" action="modelo-registrado.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $registrado['nombre_registrado']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $registrado['apellido_registrado']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $registrado['email_registrado']; ?>">
                    </div>
                    <div class="form-group" id="error"></div>
                    <div class="form-group">
                    <?php 
                        $pases_articulos = $registrado['pases_articulos'];
                        $pedido = json_decode($pases_articulos, true);
                    ?>
                        <div id="paquetes" class="paquetes" >
                            <div class="box-header with-border">
                                <h3 class="box-title">Elige el número de boletos</h3>
                            </div>
                            <ul class="lista-precio clearfix row">
                                <li class="col-md-4">
                                    <div class="tabla-precio text-center">
                                        <h3>Pase por día (Viernes)</h3>
                                        <p class="numero">$30</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las Conferencias</li>
                                            <li>Todos los Talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dia">Boletos deseados:</label>
                                            <input type="number" id="pase_dia" name="boletos[un_dia][cantidad]" min="0" size="3" placeholder="0" class="form-control" value="<?php echo $pedido['un_dia']; ?>">
                                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla-precio completo text-center">
                                        <h3>Todos los días</h3>
                                        <p class="numero">$50</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las Conferencias</li>
                                            <li>Todos los Talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_completo">Boletos deseados:</label>
                                            <input type="number" id="pase_completo" name="boletos[pase_completo][cantidad]" min="0" size="3" placeholder="0" class="form-control" value="<?php echo $pedido['pase_completo']; ?>">
                                            <input type="hidden" value="50" name="boletos[pase_completo][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla-precio text-center">
                                        <h3>Pase por dos días (Viernes y Sábado)</h3>
                                        <p class="numero">$45</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las Conferencias</li>
                                            <li>Todos los Talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dosdias">Boletos deseados:</label>
                                            <input type="number" id="pase_dosdias" name="boletos[dos_dias][cantidad]" min="0" size="3" placeholder="0" class="form-control" value="<?php echo $pedido['dos_dias']; ?>">
                                            <input type="hidden" value="45" name="boletos[dos_dias][precio]">
                                        </div>
                                    </div> <!--.tabla-precio-->
                                </li>
                            </ul> <!--.lista-precio-->
                        </div> <!--#paquetes-->
                    </div><!--.form-group boletos-->
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Elige tus Talleres</h3>
                        </div>
                        <div id="eventos" class="eventos clearfix">
                                <div class="caja">
                                <?php 
                                    $eventos = $registrado['talleres_registrados'];
                                    $id_eventos_registrados = json_decode($eventos, true);

                                    try {
                                        $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                        $sql .= "FROM eventos ";
                                        $sql .= "JOIN categoria_evento ";
                                        $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                        $sql .= "JOIN invitados ";
                                        $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                                        $sql .= "ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";
                                        
                                        $resultado = $conn->query($sql); 
                                    } catch (Exception $e) {
                                        echo "Error: ". $e->getMessage();
                                    }

                                    $eventos_dias = array();
                                
                                    while($eventos = $resultado->fetch_assoc()){
                                        $fecha = $eventos['fecha_evento'];

                                        setlocale(LC_TIME, 'es');
                                        $dia_semana = utf8_encode(strftime("%A", strtotime($fecha)));

                                        $categoria = $eventos['cat_evento'];

                                        $dia = array(
                                            'nombre_evento' => $eventos['nombre_evento'],
                                            'hora' => $eventos['hora_evento'],
                                            'id' => $eventos['evento_id'],
                                            'nombre_invitado' => $eventos['nombre_invitado'],
                                            'apellido_invitado' => $eventos['apellido_invitado']
                                        );

                                        $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                                    }

                                    ?>

                                    <?php foreach($eventos_dias as $dia => $eventos){ ?>
                                    <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix row">
                                        <h4 class="text-center"><?php echo $dia; ?></h4>

                                            <?php foreach($eventos['eventos'] as $cat_evento => $info_evento){ ?>
                                                <div class="col-md-4">
                                                    <p><?php echo $cat_evento; ?></p>
                                                    
                                                    <?php foreach($info_evento as $evento){ ?>
                                                        <label>
                                                       
                                                            <input <?php echo (in_array($evento['id'], $id_eventos_registrados['eventos']) ? 'checked' : ''); ?> type="checkbox" class="minimal" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                                            <time>
                                                            <?php  
                                                                $hora_evento = $evento['hora'];
                                                                $hora_formato = date('H:i', strtotime($hora_evento));
                                                                echo $hora_formato;
                                                            ?>
                                                            </time> <?php echo $evento['nombre_evento']; ?>
                                                            <br>
                                                            <span class="autor"><?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></span>
                                                        </label>
                                                    <?php } //fin foreach de la informacion del evento ?>
                                                </div>
                                            <?php } //fin foreach de las categorias eventos ?>
                                    </div> <!--.contenido-dia-->
                                    <?php  } //Fin del foreach de los dias?>
                                </div> <!--.caja-->
                            </div> <!--#eventos-->

                        <div id="resumen" class="resumen clearfix">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pagos y Extras</h3>
                            </div>
                            <br>
                            <div class="caja clearfix row">
                                <div class="extras col-md-6">
                                    <div class="orden">
                                        <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                                        <input type="number" class="form-control" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0" value="<?php echo (isset($pedido['camisas'])) ? $pedido['camisas'] : ''; ?>" >
                                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                    </div> <!--.orden-->
                                    <div class="orden">
                                            <label for="etiquetas">Paquete 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                                            <input type="number" class="form-control" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0" value="<?php echo (isset($pedido['etiquetas'])) ? $pedido['etiquetas'] : ''; ?>" >
                                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                    </div> <!--.orden-->
                                    <div class="orden">
                                            <label for="regalo">Seleccione un regalo</label><br>
                                            <select id="regalo" name="regalo" required class="form-control">
                                                <option value="">-Seleccione un regalo-</option>
                                                <option value="1" <?php echo ($registrado['regalo']==1) ? 'selected' : ''; ?>>Pulseras</option>
                                                <option value="2" <?php echo ($registrado['regalo']==2) ? 'selected' : ''; ?>>Etiquetas</option>
                                                <option value="3" <?php echo ($registrado['regalo']==3) ? 'selected' : ''; ?>>Plumas</option>
                                            </select>
                                    </div> <!--.orden-->
                                    <br>
                                    <input type="button" id="calcular" class="button btn btn-success" value="calcular">
                                </div> <!--.extras-->
                                <div class="total col-md-6">
                                    <p>Resumen:</p>
                                    <div id="lista-productos"></div>
                                    <br>
                                    <p>Total ya pagado:</p><?php echo $registrado['total_pagado']; ?>
                                    <br><br>
                                    <p>Total a pagar:</p>
                                    <div id="suma-total"></div>
                                    <input type="hidden" name="total_pedido" id="total_pedido">
                                </div> <!--.total-->
                            </div> <!--.caja-->
                        </div> <!--#resumen-->
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="registro" value="actualizar">
                        <input type="hidden" name="id_registro" value="<?php echo $registrado['id_registrado']; ?>">
                        <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro']; ?>">
                        <button type="submit" class="btn btn-primary" id="btnRegistro">Guardar</button>
                    </div>
                </form> 
            </div> <!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div>
    </div>
  </div><!-- /.content-wrapper -->

<?php
$conn->close();
include_once 'templates/footer.php';
?>
