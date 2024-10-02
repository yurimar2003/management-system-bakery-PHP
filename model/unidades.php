<?php

class unidades
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM unidades");
    }
    public function delete($idUnidad)
    {
        return $this->conexion->query("DELETE FROM unidades WHERE id_uni='$idUnidad'");
    }

    public function insert($nombreUnidad)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO unidades (des_uni) VALUES ('$nombreUnidad') ");
        return $respuestaBaseDeDatos;

        // if ($respuestaBaseDeDatos) {
        //     return 'Proceso Exitoso';
        // } else {
        //     return 'Ocurrio un error';
        // }
    }
    public function edit($idUnidad,$newUnidad)
    {
        return $this->conexion->query("UPDATE `unidades` SET `des_uni` = '$newUnidad' WHERE `unidades`.`id_uni` = '$idUnidad';");
    }
}
