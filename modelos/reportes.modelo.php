<?php

require_once "conexion.php";

class ModeloReportes{

    /*==============================
    EXCEL INFORMACION FORMULARIO
    ===============================*/
    static public function mdlInformacionFormulario(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM formularios");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;

    }


    /*==============================
    GUARDAR FORMULARIO
    ===============================*/
    static public function mdlGuardarFormulario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (correo_electronico, nombres, apellidos, cedula, celular, otro_celular, estado_civil, estado_civil_otro, personas_a_cargo, fecha_nacimiento, nivel_educativo, nivel_educativo_otro, estrato, ocupacion, medio_transporte, tipo_proteccion, mascota, tipo_vivienda, maneja_tarjeta_credito, ingreso_mensual, funcionario_refiere, acepta_politica_tratamiento) VALUES (:correo_electronico, :nombres, :apellidos, :cedula, :celular, :otro_celular, :estado_civil, :estado_civil_otro, :personas_a_cargo, :fecha_nacimiento, :nivel_educativo, :nivel_educativo_otro, :estrato, :ocupacion, :medio_transporte, :tipo_proteccion, :mascota, :tipo_vivienda, :maneja_tarjeta_credito, :ingreso_mensual, :funcionario_refiere, :acepta_politica_tratamiento)");

        $stmt->bindParam(":correo_electronico", $datos["correo_electronico"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":otro_celular", $datos["otro_celular"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_civil_otro", $datos["estado_civil_otro"], PDO::PARAM_STR);
        $stmt->bindParam(":personas_a_cargo", $datos["personas_a_cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":nivel_educativo", $datos["nivel_educativo"], PDO::PARAM_STR);
        $stmt->bindParam(":nivel_educativo_otro", $datos["nivel_educativo_otro"], PDO::PARAM_STR);
        $stmt->bindParam(":estrato", $datos["estrato"], PDO::PARAM_STR);
        $stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
        $stmt->bindParam(":medio_transporte", $datos["medio_transporte"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_proteccion", $datos["tipo_proteccion"], PDO::PARAM_STR);
        $stmt->bindParam(":mascota", $datos["mascota"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_vivienda", $datos["tipo_vivienda"], PDO::PARAM_STR);
        $stmt->bindParam(":maneja_tarjeta_credito", $datos["maneja_tarjeta_credito"], PDO::PARAM_STR);
        $stmt->bindParam(":ingreso_mensual", $datos["ingreso_mensual"], PDO::PARAM_STR);
        $stmt->bindParam(":funcionario_refiere", $datos["funcionario_refiere"], PDO::PARAM_STR);
        $stmt->bindParam(":acepta_politica_tratamiento", $datos["acepta_politica_tratamiento"], PDO::PARAM_STR);

        if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt = null;

    }

}