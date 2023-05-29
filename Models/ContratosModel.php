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

    public function selectContrato()
    {
        $sql = "SELECT * FROM contratos";
        $res = $this->select_all($sql);
        return $res;
    }

    public function porcentajesCont()
    {
        $sql = "SELECT estado, COUNT(*) AS total FROM contratos GROUP BY estado;";
        $res = $this->select_all($sql);
        return $res;
    }
//query de validar_cont
    public function validar_cont(){
        $sql = "SELECT * FROM validar_cont";
        $res=$this->select_all($sql);
        return $res;
    }
    public function agregar_validar(string $number, string $descripcion, string $yo, string $tu, string $fecha)
    {
        $return = "";
        $this->tu = $tu;
        $this->number = $number;
        $this->descripcion = $descripcion;        
        $this->yo = $yo;
        $this->fecha = $fecha;      

        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->number}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO validar_cont(id_contrato, descripcion, id_creador, id_validador, fecha) VALUES (?,?,?,?,?)";
            $data = array($this->number, $this->descripcion, $this->yo, $this->tu, $this->fecha);
            $resul = $this->insert($query, $data);
            
            $return = $resul;
        } else {
                $return = "Contrato existente";
        }
        
        return $return;
    }

    //Subir el archivo PDF a BD
    public function agregar_pdf(string $number, string $descripcion, string $yo, string $tu, string $nombre_archivo, string $fecha)
    {
        $return = "";
        $this->tu = $tu;
        $this->number = $number;
        $this->descripcion = $descripcion;        
        $this->yo = $yo;
        $this->fecha = $fecha;       
        $this->nombre_archivo = $nombre_archivo;
        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->number}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO validar_cont(id_contrato, descripcion, id_creador, id_validador, archivo, fecha) VALUES (?,?,?,?,?,?)";
            $data = array($this->number, $this->descripcion, $this->yo, $this->tu, $this->nombre_archivo, $this->fecha);
            $resul = $this->insert($query, $data);
            
            $return = $resul;
        } else {
                $return = "Contrato existente";
        }
        
        return $return;
    }
    public function pedir_datos()
    {
        $sql = "SELECT * FROM validar_cont";
        $res = $this->select_all($sql);
        return $res;
    }
}
?>
