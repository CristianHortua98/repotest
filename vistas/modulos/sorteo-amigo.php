<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin: auto 0;">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <form method="POST">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="form-group text-center">
                                        <h1 class="h4 text-gray-1200 mb-4"><img class="img-thumbnail" style="width: 100px; height: 100px;" src="vistas/img/nexus.jpg"> Sorteo Amigo Secreto <b>Nexus Merak</b> <img class="img-thumbnail" style="width: 100px; height: 100px;" src="vistas/img/nexus.jpg"></h1>
                                        <hr>
                                    </div>
                                    
                                        <div class="form-group">
                                            <label><b>Participante</b></label>
                                            <select class="form-control select2" name="nuevaSeleccionParticipante" id="nuevaSeleccionParticipante" required>
                                                <option value="">Seleccione su Nombre</option>
                                                <?php 
                                                
                                                $amigos = ControladorAmigo::ctrMostrarAmigos();

                                                foreach($amigos as $key => $valueAmigo): ?>

                                                    <option value="<?php echo $valueAmigo["nombre_persona"] ?>"><?php echo $valueAmigo["nombre_persona"] ?></option>

                                                <?php endforeach ?>

                                            </select>
                                            <input type="hidden" class="form-control" name="idPersonaParticipante" id="idPersonaParticipante" required>
                                            <input type="hidden" class="form-control" name="grupoFamiliarParticipante" id="grupoFamiliarParticipante" required>
                                            <input type="hidden" class="form-control" name="repetirIdPersona" id="repetirIdPersona" required>
                                        </div>
                                        <button type="submit" name="generarAmigoNavi" class="btn btn-success btn-user btn-block">Obtener Amigo Navideño</button>
                                        <hr>
                                        <!-- <h6>Realizado por: <b>Cristian Hortua</b></h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 

                    if(isset($_POST["generarAmigoNavi"])){

                        $sorteo = new ControladorAmigo();
                        $sorteo->ctrSorteoAmigo();

                    }

                ?>

            </form>

        </div>

    </div>

</div>