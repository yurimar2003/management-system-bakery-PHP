<?php

class panes
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM `panes`");
    }

    public function delete($idPan)
    {
        return $this->conexion->query("DELETE FROM `panes` WHERE `id_pan`='$idPan'");
    }

    public function insert($nombrePan)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO `panes`(`des_pan`) VALUES ('$nombrePan')");
        return $respuestaBaseDeDatos;

        // if ($respuestaBaseDeDatos) {
        //     return 'Proceso Exitoso';
        // } else {
        //     return 'Ocurrio un error';
        // }
    }
    public function edit($idPan,$newPan)
    {
        return $this->conexion->query("UPDATE panes SET des_pan = '$newPan' WHERE panes.id_pan = '$idPan'");
    }
}
