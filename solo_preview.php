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


    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>


      <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <script src="assets/js/jquery.min.js"></script>


      <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

                <?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Jefe;
new Eloquent();

extract($_GET);
extract($_POST);

$solos = Jefe::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
?>
                <div class="page-body">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                            <a class="btn btn-danger btn-lg pull-right" href="solo_pdf.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&bodega=<?php echo $bodega ?>"><i class="fa fa-download" aria-hidden="true"></i> Descargar PDF</a>
                            <hr>
                            <h3 align="center">Personas solas</h3>
                            <?php
                            $jefes = Jefe::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
                            ?>
                              

                            </div>
                        </div>


                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">Simple DataTable</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-hover" id="simpledatatable">
                                        <thead>
                                            <tr>
                                                <th>
                                             
                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Cedula
                                                </th>
                                                <th>
                                                    Edad
                                                </th>
                                                <th>
                                                    Sexo
                                                </th>
                                                <th>
                                                    Certificación
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $num = 1; ?>
                                            <?php foreach ($jefes as $jefe): ?>
                                            <tr>
                                                <td>
                                              
                                                </td>
                                                <td>
                                                    <?php echo $jefe->nombre_apellido ?>
                                                </td>
                                                <td>
                                                    <?php echo $jefe->cedula ?>
                                                </td>
                                                <td>
                                                    <?php echo $jefe->edad ?>
                                                </td>
                                                <td class="center ">
                                                    <?php if ($jefe->sexo == 2): ?>
                                                        <?php echo 'Masculino' ?>
                                                    <?php else: ?>
                                                        <?php echo 'Femenino' ?>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                <?php
                                                //Por generar - gris
                                                 if ($jefe->certificacion_solo == 0): ?>
                                                    <a href="solo_constancia_pdf.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&bodega=<?php echo $bodega ?>&cedula=<?php echo $jefe->cedula ?>" class="btn btn-labeled">
                                                        <i class="btn-label fa fa-print"></i>Generar
                                                    </a>
                                                <?php endif ?>
                                                <?php 
                                                //Generado - verde
                                                if ($jefe->certificacion_solo == 1): ?>
                                                    <a href="javascript:void(0);" class="btn btn-labeled btn-palegreen">
                                                        <i class="btn-label glyphicon glyphicon-ok"></i>Generado
                                                    </a>
                                                <?php endif ?>
                                                <?php 
                                                //Aprobado - azul
                                                if ($jefe->certificacion_solo == 2): ?>
                                                    <a href="javascript:void(0);" class="btn btn-labeled btn-info">
                                                        <i class="btn-label glyphicon glyphicon-ok"></i>Aprobado
                                                    </a>
                                                <?php endif ?>
                                                <?php 
                                                //Anulado - rojo
                                                if ($jefe->certificacion_solo == 3): ?>
                                                    <a href="javascript:void(0);" class="btn btn-labeled btn-darkorange">
                                                        <i class="btn-label glyphicon glyphicon-remove"></i>Anulado
                                                    </a>
                                                <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php $num = $num + 1 ?>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <div class="horizontal-space"></div>
                                  <pre>Numero de Familias: <?php echo $jefes->count() ?></pre>
                                  <pre>Numero de personas: <?php echo $jefes->sum('n_personas') ?></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
               


    <!--Basic Scripts-->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>

    <!--Page Related Scripts-->
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
   <!-- <script src="assets/js/datatable/dataTables.tableTools.min.js"></script> -->
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/datatable/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
    </script>


</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 10:59:22 GMT -->
</html>


