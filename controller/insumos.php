<?php
include("model/insumos.php");
$conexion = require("model/conexion.php");

$objInsumos = new insumos($conexion);

$error = '';
$action = $_REQUEST['accion'];

$insumos = $objInsumos->get();
$listUni = $objInsumos->listUni();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_INSUMO':
            $arrayValidaciones = [
                'Nombre del insumo es requerido' => !empty($_POST['des_ins']),
                'El nombre del insumo debe de tener mas de 3 caracteres'  => strlen($_POST['des_ins']) > 3,
                'Debe ser numero la existencia minima' => !empty($_POST['exi_min']) && is_numeric($_POST['exi_min']),
                'Debe ser numero la existencia maximo' => !empty($_POST['exi_max']) && is_numeric($_POST['exi_max']),
                'Debe ser numero la cantidad disponibel' => !empty($_POST['can_disp']) && is_numeric($_POST['can_disp']),
                'La existencia minima deber ser mayor a 0' => $_POST['exi_min'] > 0,
                'La existencia minima deber ser menor a la existencia maxima' => $_POST['exi_min'] < $_POST['exi_max'],
                'La cantidad disponible no cuenta con los valores de existencia' => $_POST['can_disp'] > $_POST['exi_min'] &&  $_POST['can_disp'] < $_POST['exi_max'],
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {

                    return  header("Location: /sistema-panificadora/show-insumos.php?errorform=" . $mensaje);
                }
            };
            $respuesta = $objInsumos->insert(strtoupper($_POST['des_ins']), $_POST['des_uni'], $_POST['exi_min'], $_POST['exi_max'], $_POST['can_disp']);

            if ($respuesta) {
                header("Location: /sistema-panificadora/show-insumos.php");
            } else {
                $error = 'Ocurrio un error intente nuevamente';
                header("Location: /sistema-panificadora/show-insumos.php?errorform=" . $mensaje);
            }
            break;


        case 'DELETE_INSUMO':
            if (!empty($_POST['id_ins'])) {
                $id = $_POST['id_ins'];
                $respuesta = $objInsumos->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-insumos.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

        case 'EDIT_INSUMO':
            if (!empty($_GET['id_ins']) && !empty($_POST['new_ins']) && !empty($_POST['new_uni']) && !empty($_POST['new_min']) && !empty($_POST['new_max']) && !empty($_POST['new_can'])) {
                $id = $_GET['id_ins'];
                $respuesta = $objInsumos->edit($id, $_POST['new_ins'], $_POST['new_uni'], $_POST['new_min'], $_POST['new_max'], $_POST['new_can']);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-insumos.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
    }
}
