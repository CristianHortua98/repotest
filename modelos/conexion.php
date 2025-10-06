<?php

class Conexion{


    static public function conectar(){//Local

        $link = new PDO("mysql:host=127.0.0.1:3306;dbname=db_amigo_navidenio",
        "root",
        "");

        $link->exec("set names utf8");

		return $link;


    }

    /*
    static public function conectar(){ //Pruebas

		$link = new PDO("mysql:host=127.0.0.1:3306;dbname=positiva",
			            "root",
			            "Ingens2021*");

		$link->exec("set names utf8");

		return $link;

	}
    */


}