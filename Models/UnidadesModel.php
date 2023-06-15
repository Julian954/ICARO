<?php
class UnidadesModel extends Mysql
{
    public $id, $clave, $descripcion, $descorta;
    public function __construct()
    {
        parent::__construct();
    }

    public function SelectUnidades(){        
        $sql = "SELECT * FROM unidades";
        $res = $this->select_all($sql);
        return $res;
    }
    public function editarUnidades(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM unidades WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarUnidades(string $nombre, int $clave, string $abreviacion, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->abreviacion = $abreviacion;
        $this->id = $id;        
        $query = "UPDATE unidades SET clave=?, nombre=?, abreviacion=? WHERE id=?";
        $data = array($this->clave, $this->nombre, $this->abreviacion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function insertarUnidades(string $nombre, int $clave, string $abreviacion)
    {
        $return = "";
        $this->nombre = $nombre;        
        $this->clave = $clave;
        $this->abreviacion = $abreviacion;                
            $query = "INSERT INTO unidades(clave, nombre, abreviacion) VALUES (?,?,?)";
            $data = array($this->clave, $this->nombre, $this->abreviacion);
            $resul = $this->insert($query, $data);
            $return = $resul;        
        return $return;
    }

    public function eliminarUnidades(int $id)
    {
        $return = "";
        $this->id = $id;        
        $query = "DELETE FROM unidades WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>