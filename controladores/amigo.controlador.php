<?php

class ControladorAmigo{

    static public function ctrSorteoAmigo(){

        if(isset($_POST["generarAmigoNavi"])){

            $participante = $_POST["nuevaSeleccionParticipante"];
            $idParticipante = $_POST["idPersonaParticipante"];
            $grupoFamiliar = $_POST["grupoFamiliarParticipante"];
            $repetirIdPersona = "";

            $hoy = date("Y-m-d H:i:s");  

            $obtenerParticipantes = ModeloAmigo::mdlObtenerParticipantes($participante, $grupoFamiliar, $repetirIdPersona);

            /*==================================
            ELECCION AMIGO NAVIDENIO
            ==================================*/
            $cadenaParticipantes = '';
            $array = array();
            foreach ($obtenerParticipantes as $key => $valueP) {

                array_push($array, $valueP["id_persona"]);

            }
            $conteo = count($array);
            $indiceAleatorio = mt_rand(0, $conteo - 1);
            $personaElegida = $array[$indiceAleatorio];
            $infoParticipanteElegida = ModeloAmigo::mdlInfoParticipante($personaElegida);

            /*==================================
            ACTUALIZAR ESTADO ASIGNADO
            ==================================*/
            $actualizarAsignado = ModeloAmigo::mdlActualizarAsignado($infoParticipanteElegida["id_persona"], $hoy);

            /*==================================
            ACTUALIZAR REALIZO SORTEO
            ==================================*/
            $actualizarSorteo = ModeloAmigo::mdlActualizarSorteo($idParticipante, $hoy);


            if($actualizarSorteo == "ok"){

                echo '<script>
                    swal({
                        type: "success",
                        title: "¡Tu Amigo Navideño es: <b>'.$infoParticipanteElegida["nombre_persona"].'</b>!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                        
                            window.location = "sorteo-amigo";
                        }
                    });
            
                </script>';

            }else{

                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Algo salio mal, contactar al administrador!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                        
                            window.location = "sorteo-amigo";
                        }
                    });
            
                </script>';

            }

        }

    }

    /*==================================
    OBTENER AMIGO NAVIDEÑO
    ==================================*/
    static public function ctrMostrarAmigos(){

        $respuesta = ModeloAmigo::mdlMostrarAmigos();
        
        return $respuesta;

    }

}