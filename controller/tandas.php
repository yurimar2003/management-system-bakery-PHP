<?php
include("model/tandas.php");
$conexion = require("model/conexion.php");

$objTandas = new tandas($conexion);

$error = '';
$action = $_REQUEST['accion'];

//tandas= Array que trae la data que me return el query la funcion get
$tandas = $objTandas->get();
$listPan = $objTandas->listPan();
/* $arrPanSel = $objTandas->panSel($id_pan); */

if (!empty($action)) {
    switch ($action) {
        case 'ADD_TANDA':
            $arrayValidaciones = [
                'Fecha de elaboración es requerido' => !empty($_POST['fec_tan']),
                'Cantidad de piezas es requerido' => !empty($_POST['can_pie']),
                'La cantidad de piezas deber ser mayor a 0' => $_POST['can_pie'] > 0,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objTandas->insert($_POST['fec_tan'], strtoupper($_POST['nom_pan']), $_POST['can_pie']);

            if ($respuesta) {
                header("Location: /sistema-panificadora/show-tandas.php");
            } else {
                $error = 'Ocurrio un error intente nuevamente';
            }
            break;

        case 'DELETE_TANDA':
            if (!empty($_POST['id_tan'])) {
                $id = $_POST['id_tan'];
                $respuesta = $objTandas->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-tandas.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

        case 'EDIT_TANDA':

            if (!empty($_GET['id_tan']) && !empty($_POST['new_fec']) && !empty($_POST['id_pan']) && !empty($_POST['new_can'])) {

                $id = $_GET['id_tan'];
                $respuesta = $objTandas->edit($id, $_POST['new_fec'], $_POST['id_pan'], $_POST['new_can']);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-tandas.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
    }
}
