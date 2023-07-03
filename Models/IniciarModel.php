<?php
class IniciarModel extends Mysql{
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil;
    public function __construct()
    {
        parent::__construct();
    }

    //Validad contraseña de usuario
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }

    //Selecciona datos de usuario por correo
    public function selectUsuarioC(string $usuario)
    {
        $this->usuario = $usuario;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }

    //verifica contraseña actual para cambiarla
    public function verificarPass(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "SELECT * FROM usuarios WHERE clave = '$clave' AND id = '$id'";
        $resul = $this->select($query);
        return $resul;
    }

    //cambia contraseña actual
    public function cambiarContra(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "UPDATE usuarios SET clave = ? WHERE id = ?";
        $data = array($this->clave, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

}
?>