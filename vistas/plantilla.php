<?php
date_default_timezone_set('America/Bogota');

$hoy = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amigo Navideño</title>

    <!-- Custom fonts for this template-->
    <link href="vistas/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vistas/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- Estilos Highcharts -->
    <link rel="stylesheet" href="vistas/componentes/highcharts/code/css/highcharts.css">

    <!--
    <link rel="stylesheet" href="vistas/componentes/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/componentes/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"> -->



    <!-- ====================================
    SCRIPTS
    ======================================= -->

    <!-- Bootstrap core JavaScript-->
    <script src="vistas/js/jquery/jquery.min.js"></script>
    <script src="vistas/js/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vistas/js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vistas/js/sb-admin-2.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Libreria español -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/9eb12621e6.js" crossorigin="anonymous"></script>

    <!-- SweetAlert 2 -->
    <script src="vistas/componentes/sweetalert2/sweetalert2.all.js"></script>
    <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!-- HighCharts -->
    <script src="vistas/componentes/highcharts/code/highcharts.js"></script>
    <script src="vistas/componentes/highcharts/code/highcharts-more.js"></script>
    <script src="vistas/componentes/highcharts/code/modules/exporting.js"></script>
    <script src="vistas/componentes/highcharts/code/modules/export-data.js"></script>
    <script src="vistas/componentes/highcharts/code/modules/accessibility.js"></script>
    <script src="vistas/componentes/highcharts/code/modules/drilldown.js"></script>

</head>

<body id="page-top">

    <div id="wrapper">

        <?php

            if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


            }else{

                if(isset($_GET["ruta"]) == "sorteo-amigo"){

                    include "modulos/".$_GET["ruta"].".php";

                }


            }
        
        ?>

    </div>

    <!-- Scripts -->
    <script src="vistas/js/plantilla.js?v=<?=md5_file('vistas/js/plantilla.js')?>"></script>
    <script src="vistas/js/amigo.js?v=<?=md5_file('vistas/js/amigo.js')?>"></script>

</body>

</html>