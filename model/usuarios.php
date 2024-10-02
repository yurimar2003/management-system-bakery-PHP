<?php

class usuarios
{
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function get()
    {
        return $this->conexion->query("SELECT * FROM usuarios");
    }
    
    public function insert($nombreUsuario,$email,$password)
    {
        // Sql antes de insert ver si funciona
        // die("INSERT INTO panes (des_pan) VALUES ('$nombrePan') ");
        $respuestaBaseDeDatos = $this->conexion->query("INSERT INTO usuarios (usuario, email, clave) VALUES ('$nombreUsuario','$email','$password')");
        return $respuestaBaseDeDatos;

        // if ($respuestaBaseDeDatos) {
        //     return 'Proceso Exitoso';
        // } else {
        //     return 'Ocurrio un error';
        // }
    }

    public function delete($idUsuario)
    {
        return $this->conexion->query("DELETE FROM usuarios WHERE id='$idUsuario'");
    }
    
    public function edit($idUsuario,$newUsuario,$email,$password)
    {
        return $this->conexion->query("UPDATE `usuarios` SET `usuario`='$newUsuario',`email`='$email',`clave`='$password' WHERE `usuarios`.`id` = '$idUsuario';");
    }
}
