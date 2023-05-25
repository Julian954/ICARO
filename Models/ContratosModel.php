<?php
class ContratosModel extends Mysql{

    public $numero, $descripcion, $administrador, $area, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

    public function agregarContrato(string $numero, string $administrador, string $descripcion, string $area, string $tipo, string $termino, string $maximo, string $fianza, string $estado, string $plataforma, string $devengo, string $fecha)
    {
        $return = "";
        $this->numero = $numero;
        $this->descripcion = $descripcion;
        $this->area = $area;
        $this->administrador = $administrador;
        $this->tipo = $tipo;
        $this->termino = $termino;
        $this->maximo = $maximo;
        $this->devengo = $devengo;
        $this->fianza = $fianza;
        $this->estado = $estado;
        $this->plataforma = $plataforma;
        $this->fecha = $fecha;

        $sql = "SELECT * FROM contratos WHERE numero = '{$this->numero}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO contratos(numero, descripcion, area, administrador, tipo, termino, maximo, devengo, fianza, estado, plataforma, fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->numero, $this->administrador, $this->area, $this->descripcion, $this->tipo, $this->termino, $this->maximo, $this->devengo, $this->fianza, $this->estado, $this->plataforma, $this->fecha);
            $resul = $this->insert($query, $data);
            
            $return = $resul;
        } else {
                $return = "Contrato existente";
        }
        
        return $return;
    }

}
?>
