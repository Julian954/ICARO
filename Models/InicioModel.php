<?php
class InicioModel extends Mysql{ 
    public $id, $area, $usuario, $tipo, $plataforma;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona las áreas
    public function SelectAreas()
    {
        $sql = "SELECT * FROM areas";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona los tipos
    public function SelectTipo()
    {
        $sql = "SELECT * FROM tipos";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las plataformas
    public function SelectPlataforma()
    {
        $sql = "SELECT * FROM plataformas";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega Area
    public function agregarArea(string $Area, string $Usuario)
    {
        $return = "";
        $this->Area = $Area;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO areas(area, usuario) VALUES (?,?)";
        $data = array($this->Area, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Area
    public function eliminarArea(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM areas WHERE id='{$this->id}' ";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }

    //Agrega Tipo
    public function AgregarTipo(string $Tipo, string $Usuario)
    {
        $return = "";
        $this->Tipo = $Tipo;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO tipos(tipo, usuario) VALUES (?,?)";
        $data = array($this->Tipo, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Tipo
    public function EliminarTipo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM tipos WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }

    //Agrega Plataforma
    public function AgregarPlataforma(string $Plataforma, string $Usuario)
    {
        $return = "";
        $this->Plataforma = $Plataforma;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO plataformas(plataforma, usuario) VALUES (?,?)";
        $data = array($this->Plataforma, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Plataforma
    public function EliminarPlataforma(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM plataformas WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }






    public function insertarUsuarios(string $nombre, string $usuario, string $clave, string $rol, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->correo = $correo;
        $query = "INSERT INTO usuarios(nombre, usuario, clave, rol, correo) VALUES (?,?,?,?,?)";
        $data = array($this->nombre, $this->usuario, $this->clave, $this->rol, $this->correo);
        $resul = $this->insert($query, $data); //insert es para agregar un registro
        return $resul;
    }

    //Edita los datos de un usuario
    public function actualizarUsuarios(string $nombre, string $usuario, string $rol, int $id, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->rol = $rol;
        $this->id = $id;
        $this->correo = $correo;
        $query = "UPDATE usuarios SET nombre=?, usuario=?, rol=?, correo=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->rol, $this->correo, $this->id);
        $resul = $this->update($query, $data); //Update es para actualizar un registro
        $return = $resul;
        return $return;
    }

    //Validad contraseña de usuario
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql); //selectç es para seleccionar cuando el resultado solo arroja una fila
        return $res;
    }

    //Elimina los datos de un usuario
    public function eliminarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE usuarios WHERE id= '{$this->id}'";
        $resul = $this->delate($query); //DELATE es para ELIMINAR un registro
        $return = $resul;
        return $return;
    }
}
?>