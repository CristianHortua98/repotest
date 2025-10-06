<?php 

if(isset($_GET["validaKey"])): ?>

    <?php

    //$ruta = "https://inteccvirtual.com/formulario/index.php?ruta=descargar-data&validaKey=TiinduxDescargaData2022";
    
    $keyPermite = "TiinduxDescargaData2022";

    if($keyPermite == $_GET["validaKey"]): ?>

        <a href="vistas/modulos/reportedescargar.php?descargarInformacion=SI" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Descargar Data</a>

    <?php else: ?>

        <script>

            window.location = "formulario-referidos";

        </script>

    <?php endif ?>


<?php endif ?>