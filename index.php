<?php

/*==============================
CONTROLADORES
==============================*/
require_once "controladores/plantilla.controlador.php";
// require_once "controladores/reportes.controlador.php";
require_once "controladores/amigo.controlador.php";


/*==============================
MODELO
==============================*/
// require_once "modelos/reportes.modelo.php";
require_once "modelos/amigo.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();