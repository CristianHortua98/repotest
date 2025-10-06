<?php

require_once "../controladores/amigo.controlador.php";
require_once "../modelos/amigo.modelo.php";


class AjaxAmigo{

    /*==============================
    GRUPO FAMILIA
    ===============================*/
    public $participante;

    public function ajaxTraerGrupoFamiliar(){

        $participante = $this->participante;

        $infoParticipante = ModeloAmigo::mdlObtenerInfoParticipante($participante);

        echo json_encode($infoParticipante);

    }

}

/*==============================
GUARDAR FORMULARIO
===============================*/
if(isset($_POST["participante"])){

    $mostrarGrupoF = new AjaxAmigo();
    $mostrarGrupoF->participante = $_POST["participante"];
    $mostrarGrupoF->ajaxTraerGrupoFamiliar();

}