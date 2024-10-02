<?php

class insumos
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listUni(){
        
        $query = ("SELECT * FROM unidades");
        
        return $this->conexion->query($query);
    }

    public function get()
    {
        return $this->conexion->query("SELECT insumos.id_ins, insumos.des_ins, unidades.des_uni, insumos.exi_min, insumos.exi_max, insumos.can_disp 
        FROM unidades
        INNER JOIN insumos 
        ON unidades.id_uni=insumos.id_uni
        /* ORDER BY panes.des_pan */");
    }

    public function insert($desIns, $desUni, $exiMin, $exiMax, $canDisp)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO insumos(des_ins, id_uni, exi_min, exi_max, can_disp) VALUES ('$desIns','$desUni','$exiMin','$exiMax','$canDisp')");
        return $respuestaBaseDeDatos;
    }

    public function delete($idInsumos)
    {
        return $this->conexion->query("DELETE FROM insumos WHERE id_ins='$idInsumos'");
    }

    public function edit($idInsumos,$newIns,$newUni,$newMin,$newMax,$newCan)
    {
        return $this->conexion->query("UPDATE insumos SET des_ins='$newIns', id_uni='$newUni', exi_min='$newMin', exi_max='$newMax', can_disp='$newCan' WHERE insumos.id_ins ='$idInsumos'");
    }

/*     public function uniSel($id_uni)
    {
        $query = ("SELECT des_uni FROM unidades WHERE id_uni=$id_uni;");
        return $this->conexion->query($query);
    } */

}