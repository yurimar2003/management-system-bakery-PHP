<?php
include("model/unidades.php");
$conexion = require("model/conexion.php");

$objUnidades = new unidades($conexion);

$error = '';
$action = $_REQUEST['accion'];

$unidades = $objUnidades->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_UNIDAD':
            $arrayValidaciones = [
                'Nombre de la unidad es requerido' => !empty($_POST['name_unidad']),
                'El nombre de la unidad debe de tener mas de 2 caracteres'  => strlen($_POST['name_unidad']) > 2,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objUnidades->insert(strtoupper($_POST['name_unidad']));

            if ($respuesta) {
                header("Location: /sistema-panificadora/show-unidades.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_UNIDAD':
            if (!empty($_POST['uni_id'])) {
                $id = $_POST['uni_id'];
                $respuesta = $objUnidades->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-unidades.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_UNIDAD':
            if (!empty($_GET['uni_id']) && !empty($_POST['new_uni'])) {
                $id = $_GET['uni_id'];
                $respuesta = $objUnidades->edit($id, strtoupper($_POST['new_uni']));

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-unidades.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;
    }
}
