<?php
include("model/panes.php");
$conexion = require("model/conexion.php");

$objPanes = new panes($conexion);

$error = '';
$action = $_REQUEST['accion'];

$panes = $objPanes->get();

if (!empty($action)) {
    switch ($action) {
        case 'ADD_PAN':
            $arrayValidaciones = [
                'Nombre del pan es requerido' => !empty($_POST['name_pan']),
                'El nombre del pan debe de tener mas de 3 caracteres'  => strlen($_POST['name_pan']) > 3,
            ];
            foreach ($arrayValidaciones as $mensaje => $condicion) {
                if (!$condicion) {
                    $error = $mensaje;
                    return $error;
                }
            };
            $respuesta = $objPanes->insert(strtoupper($_POST['name_pan']));

            if ($respuesta) {
                header("Location: /sistema-panificadora/show-panes.php");
            } else {
                $error = 'Ocurrio un error intenten nuevamente';
            }
            break;

        case 'DELETE_PAN':
            if (!empty($_POST['pan_id'])) {
                $id = $_POST['pan_id'];
                $respuesta = $objPanes->delete($id);

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-panes.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }

            break;

        case 'EDIT_PAN':
            if (!empty($_GET['pan_id']) && !empty($_POST['new_pan'])) {
                $id = $_GET['pan_id'];
                $respuesta = $objPanes->edit($id, strtoupper($_POST['new_pan']));

                if ($respuesta) {
                    header("Location: /sistema-panificadora/show-panes.php");
                } else {
                    $error = 'Ocurrio un error intenten nuevamente';
                }
            }


            break;
    }
}
