<div class="container-fluid">
    <div class="card shadow mb-4" align="center">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Reporte Estado Ticket</h6>
        </div>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label class="text-center text-primary"><b>Fecha Inicio</b></label>
                        <input type="date" class="form-control" name="nuevaFechaInicio" required>
                    </div>
                    <div class="col-md-3">
                        <label class="text-center text-primary"><b>Fecha Fin</b></label>
                        <input type="date" class="form-control" name="nuevaFechaFin" required>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <br>

                <center>
                    <button type="submit" class="btn btn-success" name="generarGrafica"><i class="fa fa-solid fa-gear"></i> Buscar</button>
                </center>
            </div>
        </form>
    </div>

    <?php if(isset($_POST["generarGrafica"])): ?>

    <h5>Rango de Fechas Seleccionadas: <b class="text-primary">Fecha Inicio:</b> <?php echo $_POST["nuevaFechaInicio"]; ?> - <b class="text-primary">Fecha Fin:</b> <?php echo $_POST["nuevaFechaFin"]; ?></h5>

    <?php endif ?>

    <?php if(isset($_POST["generarGrafica"])): ?>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="graficaPieEstadoTickets"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="graficaBarrasEstadoTickets"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">Información Tickets</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tablaReporte" width="100%">
                    <thead>
                        <tr>
                            <td style="font-size:80%;">#</td>
                            <td style="font-size:80%;">Tipo Soporte</td>
                            <td style="font-size:80%;">Proyecto</td>
                            <td style="font-size:80%;">Usuario Solicitud</td>
                            <td style="font-size:80%;">Asunto Ticket</td>
                            <td style="font-size:80%;">Fecha Ticket</td>
                            <td style="font-size:80%;">Usuario Gestion</td>
                            <td style="font-size:80%;">Fecha Gestion</td>
                            <td style="font-size:80%;">Estado</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $infoTicket = ControladorReportes::ctrInformacionTicketFecha($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);
                        
                        foreach($infoTicket as $key => $value):

                            $tablaResponsable = "usuarios";
                            $itemResponsable = "id";
                            $valorResponsable = $value["id_usuario_responsable"];

                            $responsable = ControladorUsuarios::ctrObtenerDato($tablaResponsable, $itemResponsable, $valorResponsable);
                        ?>

                        <tr>
                            <td style="font-size:80%;"><?php echo $value["id_ticket"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["tipo_soporte"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["proyecto"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["nombre"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["asunto_ticket"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["fecha_crea"]; ?></td>
                            <td style="font-size:80%;"><?php echo $responsable["nombre"]; ?></td>
                            <td style="font-size:80%;"><?php echo $value["fecha_gestion_soporte"]; ?></td>
                            <?php if($value["estado"] == "PENDIENTE"): ?>
                                <td style="font-size:80%;"><button class="btn btn-warning btn-sm"><?php echo $value["estado"]; ?></button></td>
                            <?php else: ?>
                                <td style="font-size:80%;"><button class="btn btn-success btn-sm"><?php echo $value["estado"]; ?></button></td>
                            <?php endif ?>
                        </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        

    <?php endif ?>

</div>

<!-- ====================================
GRAFICA ESTADO TICKETS PIE
=======================================-->
<script>

Highcharts.chart('graficaPieEstadoTickets', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: ''
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Cantidad',
    colorByPoint: true,
    data: [


        <?php 

            $datos = ControladorReportes::ctrReporteTicketEstadoFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);

            $cadena = "";

            foreach ($datos as $key => $value) {

                $cadena .= "{name:"."'".$value["estado"]."', y:".$value["cantidad"]."},";

            }

            echo $cadena;
            
            
        ?>

    ]
  }]
});

</script>


<!-- ====================================
USUARIOS
=======================================-->
<script>

Highcharts.chart('graficaBarrasEstadoTickets', {
    title: {
        text: ''
    },
    chart: {
        styledMode: true
    },
    xAxis: {
        categories: [

            <?php 
                
                $datos = ControladorReportes::ctrReporteTicketEstadoFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);

                $cadena = "";

                foreach ($datos as $key => $value) {

                    $cadena .= "'".$value["estado"] . "',";

                }

                echo $cadena;
                
            ?>

        ]
    },
    yAxis: {
      title: {
        text: 'Cantidad'
      }
    },
    plotOptions: {
        series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
            format: '{point.y}'
        }
        }
    },
    series: [{
    type: 'column',
    name: 'Cantidad',
    colorByPoint: true,
    data: [

        <?php 

            $datos = ControladorReportes::ctrReporteTicketEstadoFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);

            $cadena = "";

            foreach ($datos as $key => $value) {

                $cadena .= $value["cantidad"].",";

            }

            echo $cadena;
            
        ?>

    ],
    showInLegend: false
  }]
});

</script>