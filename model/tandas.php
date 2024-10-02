<?php

class tandas
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listPan()
    {

        $query = ("SELECT * FROM panes");

        return $this->conexion->query($query);
    }

    public function get()
    {
        return $this->conexion->query("SELECT tandas.id_tan, tandas.fec_tan, panes.des_pan,tandas.can_pie 
        FROM panes
        INNER JOIN tandas 
        ON panes.id_pan=tandas.id_pan
        /* ORDER BY panes.des_pan */");
    }

    public function insert($fec_tan, $id_pan, $can_pie)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO tandas( fec_tan, id_pan, can_pie) VALUES ('$fec_tan','$id_pan','$can_pie')");
        return $respuestaBaseDeDatos;
    }

    public function delete($idTandas)
    {
        return $this->conexion->query("DELETE FROM tandas WHERE id_tan='$idTandas'");
    }

    public function edit($idTandas, $new_fec, $new_pan,  $new_pie)
    {
        return $this->conexion->query("UPDATE tandas SET fec_tan='$new_fec', can_pie='$new_pie', id_pan='$new_pan' WHERE tandas.id_tan = '$idTandas'");
    }

    public function panSel($id_pan)
    {
        $query = ("SELECT des_pan FROM panes WHERE id_pan='$id_pan';");
        return $this->conexion->query($query);
    }
}
