<?php
require __DIR__ . '/vendor/autoload.php';
use DB\Eloquent;
use Models\Jefe;
new Eloquent();


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
extract($_POST);
$solos = Jefe::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
?>

<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.4.1
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 10:56:56 GMT -->
<head>
    <meta charset="utf-8" />
    <title>C.A.D.I.P | Inicio </title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">


    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>


<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

      <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</head>
<!-- /Head -->
<!-- Body -->
<body>

    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
						<!--CADIP -->
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
  <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Buscar Productos</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="active">
                        <a href="index.html">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Inicio </span>
                        </a>
                    </li>
                    <!--Databoxes-->
                    <li>
                        <a href="databoxes.html">
                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
                            <span class="menu-text"> Preguntas frecuentes </span>
                        </a>
                    </li>
                    <!--Widgets-->
                    <li>
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-th"></i>
                            <span class="menu-text"> Soporte Tecnico </span>
                        </a>
                    </li>
								<!--UI Elements-->
								<!--
								<li>
									<a href="#" class="menu-dropdown">
										<i class="menu-icon fa fa-desktop"></i>
										<span class="menu-text"> Elements </span>
										<i class="menu-expand"></i>
									</a>

									<ul class="submenu">
										<li>
											<a href="elements.html">
												<span class="menu-text">Basic Elements</span>
											</a>
										</li>
									</ul>
								</li>
								-->
                </ul>
                <!-- /Sidebar Menu -->
            </div>

            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Inicio</a>
                        </li>
                        <li class="active">Panel</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Panel - Administrador
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
					<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
              				</div>
							<div class="col-lg-12 col-sm-12 col-xs-12">
							<a class="btn btn-danger btn-lg pull-right" href="http://localhost/cadiphugo/solo_pdf.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&bodega=<?php echo $bodega ?>"><i class="fa fa-download" aria-hidden="true"></i> Descargar PDF</a>
							<hr>
 <h3 align="center">Personas solas</h3>
  <table id="myTable">  
    <thead>
      <tr>
        <th>Nombre Apellido</th>
        <th>Cedula</th>
        <th>Edad</th>
        <th>Sexo</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($solos as $solo): ?>
        <tr>
            <td align="left"><?php echo $solo->nombre_apellido ?></td>
            <td align="center"><?php echo $solo->cedula ?></td>
            <td align="center"><?php echo $solo->edad ?></td>
            <td align="center">
            <?php 
            if($solo->sexo == '2')
            {
                echo "Masculino";
            }
            else
            {
                echo "Femenino";
            }
            ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>
  <hr>
  <pre>Total personas solas: <?php echo $solos->count() ?></pre>
							</div>
	                    </div>
	                </div>
	            </div>
	            <div class="horizontal-space"></div>
	        </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
    <!--Basic Scripts-->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>


    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/js/charts/sparkline/sparkline-init.js"></script>

    <!--Easy Pie Charts Needed Scripts-->
    <script src="assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/js/charts/easypiechart/easypiechart-init.js"></script>

    <!--Flot Charts Needed Scripts-->
    <script src="assets/js/charts/flot/jquery.flot.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.orderBars.js"></script>


</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 10:59:22 GMT -->
</html>



