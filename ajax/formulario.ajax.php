<?php

require_once "../controladores/reportes.controlador.php";
require_once "../modelos/reportes.modelo.php";


class AjaxFormulario{

    /*==============================
    GUARDAR FORMULARIO
    ===============================*/
    public $correoElectronico;
    public $nombres;
    public $apellidos;
    public $cedula;
    public $celular;
    public $otroCelular;
    public $EstadoCivil;
    public $EstadoCivilOtros;
    public $PersonasACargo;
    public $FechaNacimiento;
    public $NivelEducativo;
    public $NivelEducativolOtros;
    public $Estrato;
    public $Ocupacion;
    public $MedioTransporte;
    public $cadenaTiposProteccion;
    public $TieneMascota;
    public $TipoVivienda;
    public $ManejaTarjeta;
    public $IngresoMensual;
    public $CodigoRefiere;
    public $PoliticaDatos;


    public function ajaxGuardarFormulario(){

        $correoElectronico = $this->correoElectronico;
        $nombres = $this->nombres;
        $apellidos = $this->apellidos;
        $cedula = $this->cedula;
        $celular = $this->celular;
        $otroCelular = $this->otroCelular;
        $EstadoCivil = $this->EstadoCivil;
        $EstadoCivilOtros = $this->EstadoCivilOtros;
        $PersonasACargo = $this->PersonasACargo;
        $FechaNacimiento = $this->FechaNacimiento;
        $NivelEducativo = $this->NivelEducativo;
        $NivelEducativolOtros = $this->NivelEducativolOtros;
        $Estrato = $this->Estrato;
        $Ocupacion = $this->Ocupacion;
        $MedioTransporte = $this->MedioTransporte;
        $cadenaTiposProteccion = $this->cadenaTiposProteccion;
        $TieneMascota = $this->TieneMascota;
        $TipoVivienda = $this->TipoVivienda;
        $ManejaTarjeta = $this->ManejaTarjeta;
        $IngresoMensual = $this->IngresoMensual;
        $CodigoRefiere = $this->CodigoRefiere;
        $PoliticaDatos = $this->PoliticaDatos;

        $tabla = "formularios";

        $datos = array(

            "correo_electronico" => $correoElectronico,
            "nombres" => $nombres,
            "apellidos" => $apellidos,
            "cedula" => $cedula,
            "celular" => $celular,
            "otro_celular" => $otroCelular,
            "estado_civil" => $EstadoCivil,
            "estado_civil_otro" => $EstadoCivilOtros,
            "personas_a_cargo" => $PersonasACargo,
            "fecha_nacimiento" => $FechaNacimiento,
            "nivel_educativo" => $NivelEducativo,
            "nivel_educativo_otro" => $NivelEducativolOtros,
            "estrato" => $Estrato,
            "ocupacion" => $Ocupacion,
            "medio_transporte" => $MedioTransporte,
            "tipo_proteccion" => $cadenaTiposProteccion,
            "mascota" => $TieneMascota,
            "tipo_vivienda" => $TipoVivienda,
            "maneja_tarjeta_credito" => $ManejaTarjeta,
            "ingreso_mensual" => $IngresoMensual,
            "funcionario_refiere" => $CodigoRefiere,
            "acepta_politica_tratamiento" => $PoliticaDatos

        );

        $guardarForm = ModeloReportes::mdlGuardarFormulario($tabla, $datos);

        echo json_encode($guardarForm);

    }

}

/*==============================
GUARDAR FORMULARIO
===============================*/
if(isset($_POST["correoElectronico"])){

    $guardarFormulario = new AjaxFormulario();
    $guardarFormulario->correoElectronico = $_POST["correoElectronico"];
    $guardarFormulario->nombres = $_POST["nombres"];
    $guardarFormulario->apellidos = $_POST["apellidos"];
    $guardarFormulario->cedula = $_POST["cedula"];
    $guardarFormulario->celular = $_POST["celular"];
    $guardarFormulario->otroCelular = $_POST["otroCelular"];
    $guardarFormulario->EstadoCivil = $_POST["EstadoCivil"];
    $guardarFormulario->EstadoCivilOtros = $_POST["EstadoCivilOtros"];
    $guardarFormulario->PersonasACargo = $_POST["PersonasACargo"];
    $guardarFormulario->FechaNacimiento = $_POST["FechaNacimiento"];
    $guardarFormulario->NivelEducativo = $_POST["NivelEducativo"];
    $guardarFormulario->NivelEducativolOtros = $_POST["NivelEducativolOtros"];
    $guardarFormulario->Estrato = $_POST["Estrato"];
    $guardarFormulario->Ocupacion = $_POST["Ocupacion"];
    $guardarFormulario->MedioTransporte = $_POST["MedioTransporte"];
    $guardarFormulario->cadenaTiposProteccion = $_POST["cadenaTiposProteccion"];
    $guardarFormulario->TieneMascota = $_POST["TieneMascota"];
    $guardarFormulario->TipoVivienda = $_POST["TipoVivienda"];
    $guardarFormulario->ManejaTarjeta = $_POST["ManejaTarjeta"];
    $guardarFormulario->IngresoMensual = $_POST["IngresoMensual"];
    $guardarFormulario->CodigoRefiere = $_POST["CodigoRefiere"];
    $guardarFormulario->PoliticaDatos = $_POST["PoliticaDatos"];
    $guardarFormulario->ajaxGuardarFormulario();

}