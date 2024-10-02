<?php
include("model/inventario.php");
$conexion = require("model/conexion.php");

$objInventarios = new inventarios($conexion);

$error = '';
$action = $_REQUEST['accion'];

//tandas= Array que trae la data que me return el query la funcion get
$inventarios = $objInventarios->get();
$listPan = $objInventarios->listPan();
$listIns = $objInventarios->listIns();
$listUni = $objInventarios->listUni();
/* $arrPanSel = $objTandas->panSel($id_pan); */

if (!empty($action)) {
    switch ($action) {
        case 'ADD_INVENTARIO':
            $arrayValidaciones = [
                'El nombre del pan es requerido' => !empty($_POST['des_pan']),
                'El nombre del insumo es requerido' => !empty($_POST['des_ins']),
                'La unidad es requerida' => !empty($_POST['des_uni']),
                'Cantidad de insumos es requerido' => !empty($_POST['can_ins']),
                'La cantidad de insumos deber ser mayor a 0' => $_POST['can_ins'] > 0,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            echo($_POST['des_pan']&& $_POST['des_ins'] && $_POST['can_ins'] && $_POST['des_uni']);
            die();
            $respuesta = $objInventarios->insert($_POST['des_pan'], $_POST['des_ins'], $_POST['can_ins'], $_POST['des_uni']);
            if ($respuesta) {
                header("Location: /sistema-panificadora/show-inventario.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }


        case 'DELETE_INVENTARIO':
            if (!empty($_POST['id_panins'])) {
                $id = $_POST['id_panins'];
                $respuesta = $objInventarios->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-inventario.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            case 'EDIT_INVENTARIO':
                if (!empty($_GET['id_panins']) && !empty($_POST['new_pan']) && !empty($_POST['new_ins']) && !empty($_POST['new_can']) && !empty($_POST['new_uni'])) {
                    $id = $_GET['id_panins'];
                    $respuesta = $objInventarios->edit($id, $_POST['new_pan'], $_POST['new_ins'], $_POST['new_can'], $_POST['new_uni']);
    
                    if ($respuesta) {
                        header("Location: /sistema-panificadora/show-inventario.php");
                    } else {
                        $error = 'Ocurrio un error intenten nuevamente';
                    }
                }
    
                break;
    }
}
