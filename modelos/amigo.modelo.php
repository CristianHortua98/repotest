<?php

require_once "conexion.php";

class ModeloAmigo{

    /*==================================
    ACTUALIZAR REALIZO SORTEO
    ==================================*/
    static public function mdlActualizarSorteo($idParticipante, $hoy){

        $stmt = Conexion::conectar()->prepare("UPDATE amigo_navidenio SET realizo_sorteo = '1', fecha_sorteo = '$hoy' WHERE id_persona = $idParticipante");

        if($stmt->execute()){

            return "ok";

        }else{

            return $stmt->errorInfo();

        }

        $stmt = null;

    }


    /*==================================
    ACTUALIZAR ESTADO ASIGNADO
    ==================================*/
    static public function mdlActualizarAsignado($idPersona, $hoy){

        $stmt = Conexion::conectar()->prepare("UPDATE amigo_navidenio SET asignado = '1', fecha_asignado = '$hoy' WHERE id_persona = $idPersona");

        if($stmt->execute()){

            return "ok";

        }else{

            return $stmt->errorInfo();

        }

        $stmt = null;

    }


    static public function mdlInfoParticipante($personaElegida){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM amigo_navidenio WHERE id_persona = $personaElegida");

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;


    }


    static public function mdlObtenerParticipantes($participante, $grupoFamiliar, $repetirIdPersona){

        if($repetirIdPersona != ""){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM amigo_navidenio WHERE nombre_persona != '$participante' AND grupo_familiar != $grupoFamiliar AND asignado = '0' AND id_persona != $repetirIdPersona");

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt = null;

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM amigo_navidenio WHERE nombre_persona != '$participante' AND grupo_familiar != $grupoFamiliar AND asignado = '0'");

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt = null;

        }

    }


    /*==================================
    OBTENER INFO PARTICIPANTE
    ==================================*/
    static public function mdlObtenerInfoParticipante($participante){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM amigo_navidenio WHERE nombre_persona = '$participante'");

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;

    }

    /*==================================
    OBTENER AMIGO NAVIDEÑO
    ==================================*/
    static public function mdlMostrarAmigos(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM amigo_navidenio WHERE realizo_sorteo = 0");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;

    }

}