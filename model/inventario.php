<?php

class inventarios
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listPan(){
        
        $query = ("SELECT * FROM panes");
        
        return $this->conexion->query($query);
    }

    public function listIns(){
        
        $query = ("SELECT * FROM insumos");
        
        return $this->conexion->query($query);
    }

    public function listUni(){
        
        $query = ("SELECT * FROM unidades");
        
        return $this->conexion->query($query);
    }

    public function get()
    {
        return $this->conexion->query("SELECT a.id_panins, b.des_pan, c.des_ins, a.can_ins, d.des_uni
        FROM panes_insumos a
        INNER JOIN panes b ON b.id_pan=a.id_pan 
        INNER JOIN insumos c ON c.id_ins=a.id_ins
        INNER JOIN unidades d ON d.id_uni=a.id_uni
        /* ORDER BY panes.des_pan */");
    }

    public function insert($idPan, $idIns, $canIns, $idUni)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO panes_insumos (id_pan, id_ins, can_ins, id_uni) VALUES ('$idPan','$idIns','$canIns','$idUni')");
        return $respuestaBaseDeDatos;
    }

    public function delete($idPanins)
    {
        return $this->conexion->query("DELETE FROM panes_insumos WHERE id_panins='$idPanins'");
    }

    public function edit($idInventario,$newPan,$newIns,$canIns,$newUni)
    {
        return $this->conexion->query("UPDATE panes_insumos SET id_pan='$newPan', id_ins='$newIns', can_ins='$canIns', id_uni='$newUni' WHERE panes_insumos.id_panins ='$idInventario'");
    }
}