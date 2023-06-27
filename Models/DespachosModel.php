<?php
class DespachosModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil; //Aquí van las variables que están en la base de datos, podemos dejarlas en blanco pero ponerlas aquí facilita el trabajo
    public function __construct()
    {
        parent::__construct();
    }

    public function agregarDespacho(string $unidad,int $negadas,string $remision,string $entrega,string $archivo,string $fecha_termina) {
        $return = "";
        $this->unidad = $unidad;
        $this->negadas = $negadas;
        $this->remision = $remision;
        $this->entrega = $entrega;
        $this->archivo = $archivo;
        $this->fecha_termina = $fecha_termina;    

        // Verifica si el contrato ya existe en la base de datos
        $sql = "SELECT * FROM despachos WHERE remision= '{$this->remision}'";
        $result = $this->select($sql);

        if (empty($result)) {
            // Si el contrato no existe, se inserta en la base de datos
            $query = "INSERT INTO despachos(unidad, negadas, remision, fecha_entrega, archivo, fecha_termina) VALUES (?,?,?,?,?,?)";
            $data = array($this->unidad, $this->negadas, $this->remision, $this->entrega, $this->archivo, $this->fecha_termina);
            $resul = $this->insert($query, $data);
            $return = $resul;
        } else {
            // Si el contrato ya existe, se devuelve un mensaje indicando que el contrato ya existe
            $return = "existe";
        }
        return $return;
    }
    public function SelectUnidad()
    {
        $sql = "SELECT * FROM unidades";
        $res = $this->select_all($sql);
        return $res;
    }
    public function agregar_pdf(string $remision, string $archivo)
    {
        $return = "";
        $this->remision = $remision;
        $this->archivo = $archivo;
        //$this->intento = $intento;        
        //$this->tipo = $tipo;    
        $query = "INSERT INTO despachos(remision, archivo) VALUES (?,?)";
        $data = array($this->remision, $this->archivo);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
}


?>