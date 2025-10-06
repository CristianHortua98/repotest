<?php

// $ruta = $_SERVER["DOCUMENT_ROOT"]."/formulario/extensiones/Spout/src/Spout/Autoloader/autoload.php";

require $ruta;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;


class ControladorReportes{


    /*==============================
    EXCEL INFORMACION FORMULARIO
    ===============================*/
    static public function ctrInformacionFormulario(){

        if(isset($_GET["descargarInformacion"])){

            $writer = WriterEntityFactory::createCSVWriter();

            $writer->setFieldDelimiter(';');

            $writer->openToBrowser('Información Formulario.csv');

            $data = array(

                'Id Formulario',
                'Correo Electronico',
                'Nombres',
                'Apellidos',
                'Cedula',
                'Celular',
                'Otro Celular',
                'Estado Civil',
                'Estado Civil Otro',
                'Personar A Cargo',
                'Fecha Nacimiento',
                'Nivel Educativo',
                'Nivel Educativo Otro',
                'Estrato',
                'Ocupacion',
                'Medio Transporte',
                'Tipo Proteccion',
                'Mascota',
                'Tipo Vivienda',
                'Manejo Tarjeta Credito',
                'Ingreso Mensual',
                'Funcionario_refiere',
                'acepta_politica_tratamiento',
                'fecha_crea',

            );

            $rowFromValues = WriterEntityFactory::createRowFromArray($data);    
            $writer->addRow($rowFromValues);

            $datos = ModeloReportes::mdlInformacionFormulario();

            foreach ($datos as $key => $value) {

                $infoData = array(

                    $value["id_formulario"],
                    $value["correo_electronico"],
                    $value["nombres"],
                    $value["apellidos"],
                    $value["cedula"],
                    $value["celular"],
                    $value["otro_celular"],
                    $value["estado_civil"],
                    $value["estado_civil_otro"],
                    $value["personas_a_cargo"],
                    $value["fecha_nacimiento"],
                    $value["nivel_educativo"],
                    $value["nivel_educativo_otro"],
                    $value["estrato"],
                    $value["ocupacion"],
                    $value["medio_transporte"],
                    $value["tipo_proteccion"],
                    $value["mascota"],
                    $value["tipo_vivienda"],
                    $value["maneja_tarjeta_credito"],
                    $value["ingreso_mensual"],
                    $value["funcionario_refiere"],
                    $value["acepta_politica_tratamiento"],
                    $value["fecha_crea"]

                );

                $rowFromValuesData = WriterEntityFactory::createRowFromArray($infoData);
                $writer->addRow($rowFromValuesData);

            }

            $writer->close();

        }

    }


}