<?php

class ArticulosModel extends Mysql
{

    public $id, $clave, $descripcion, $descorta;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona usuarios activos
    public function selectArticulos()
    {
        $sql = "SELECT * FROM catalogo";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo usuario
    public function insertarArticulos(string $clave, string $descripcion, string $corta)
    {
        $return = "";
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->corta = $corta;
        $sql = "SELECT * FROM catalogo WHERE clave = '{$this->clave}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO catalogo( clave, descripcion, des_corta) VALUES (?,?,?)";
            $data = array($this->clave, $this->descripcion, $this->corta);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    public function actualizarArticulos(string $clave, string $descripcion, string $corta, int $id)
    {
        $return = "";
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->corta = $corta;
        $this->id = $id;
        $query = "UPDATE catalogo SET clave=?, descripcion=?, des_corta=? WHERE id=?";
        $data = array($this->clave, $this->descripcion, $this->corta, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function editarArticulo(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM catalogo WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    public function eliminarArticulo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM catalogo WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function procesarArchivos($datos)
    {
        array_splice($datos, 0,5);
        foreach ($datos as $fila) {
          $clave = $fila[2] ?? ''; // Valor de la columna "GPO" en el archivo CSV
          $descripcion = $fila[8] ?? ''; // Valor de la columna "ESP" en el archivo CSV
          $cantidad = $fila[10]??''; //valor de la columna cantidad
        
          // Insertar los datos en la base de datos
          $query = "INSERT INTO catalogo (clave, descripcion, cantidad) VALUES (?,?,?)";
          $data = array($clave, $descripcion, $cantidad);
          $resul = $this->insert($query, $data); //insert es para agregar un registro
        }
    
        return $return;
    }

}
?>