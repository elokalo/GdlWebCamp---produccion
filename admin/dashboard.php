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
        Dashboard
        <small>información sobre el evento</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box-body chart-responsive">
                <div class="chart" id="grafica_registros" style="height: 300px;"></div>
            </div>
        </div>

        <h2 class="page-header">Resúmen de Registros</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
                    $resultado = $conn->query($sql);
                    $total_registros = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3><?php echo $total_registros['registros']; ?></h3>
                    <p>Total Registros</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado= 1";
                    $resultado = $conn->query($sql);
                    $total_registros = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3><?php echo $total_registros['registros']; ?></h3>
                    <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-user-check"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado= 0";
                    $resultado = $conn->query($sql);
                    $total_registros = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3><?php echo $total_registros['registros']; ?></h3>
                    <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado= 1";
                    $resultado = $conn->query($sql);
                    $ganancias = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3>$<?php echo $ganancias['ganancias']; ?></h3>
                    <p>Ganancias</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <h2 class="page-header">Regalos</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE (pagado=1) AND (regalo=1)";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-teal">
                    <div class="inner">
                    <h3><?php echo $regalo['pulseras']; ?></h3>
                    <p>Pulseras</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-circle-notch"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE (pagado=1) AND (regalo=2)";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-maroon">
                    <div class="inner">
                    <h3><?php echo $regalo['etiquetas']; ?></h3>
                    <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-tags"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE (pagado=1) AND (regalo=3)";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-purple-active">
                    <div class="inner">
                    <h3><?php echo $regalo['plumas']; ?></h3>
                    <p>Plumas</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-pen-alt"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include_once 'templates/footer.php';
?>

