<div class="container-fluid">
    <div class="card shadow mb-4" align="center">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Reporte Promedio Gestion Ticket</h6>
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

        <div class="row mb-4">

            <?php 

            $promedios = ControladorReportes::ctrReportePromedioTicketFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);
            
            foreach($promedios as $key => $value):
            
            ?>

            <div class="col-md-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    PROMEDIO GESTION - SOPORTE <?php echo $value["tipo_soporte"]; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $value["minutos"]; ?> min</div>
                            <?php 
                            
                            $promedioPrioridad = ControladorReportes::ctrReportePromedioPrioridadFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"], $value["tipo_soporte"]);
                            
                            foreach($promedioPrioridad as $keyPrioridad => $valuePrioridad): ?>
                            
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    PROMEDIO PRIORIDAD <?php echo $valuePrioridad["prioridad"]; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $valuePrioridad["minutos"]; ?> min</div>

                            <?php endforeach ?>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php endforeach ?>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">Información Tickets </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                        <td style="font-size:80%;">Minutos Gestion</td>
                                        <td style="font-size:80%;">Estado</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $infoTicket = ControladorReportes::ctrInfoPromedioEstadoTicketFechas($_POST["nuevaFechaInicio"], $_POST["nuevaFechaFin"]);
                                    
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
                                        <td style="font-size:80%;"><?php echo $value["minutos"]; ?></td>
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
                </div>
            </div>
        </div>
        

    <?php endif ?>

</div>