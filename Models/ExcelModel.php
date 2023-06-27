<?php
class ExcelModel extends Mysql{ 
    public $id, $area, $usuario, $tipo, $plataforma, $tipocontrata  ;

    public function __construct()
    {
        parent::__construct();
    }

        public function fechain()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM indicadores";
            $res = $this->select($sql);
            return $res;
        }

        public function fechane()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM negadas";
            $res = $this->select($sql);
            return $res;
        }

        public function fechana()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM nacional";
            $res = $this->select($sql);
            return $res;
        }

        public function fechap()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM pedidos";
            $res = $this->select($sql);
            return $res;
        }

    //Agrega nuevos productos
    public function insertarProductos(String $codigo, string $nombre, string $precio, string $proveedor, string $categoria, string $tipo, string $minimo  )
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->proveedor = $proveedor;
        $this->categoria = $categoria;
        $this->tipo = $tipo;
        $this->minimo = $minimo;
        $sql = "SELECT * FROM productos WHERE codigo = '{$this->codigo}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO productos(codigo, nombre, precio, proveedor, categoria, tipo, minimo) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->codigo, $this->nombre, $this->precio, $this->proveedor, $this->categoria, $this->tipo, $this->minimo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }


}
?>