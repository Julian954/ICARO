<?php

class ContratosModel extends Mysql {

    /**
     * Propiedades de la clase ContratosModel
     */
    public $numero, $descripcion, $administrador, $area, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha;

    /**
     * Constructor de la clase ContratosModel
     * Llama al constructor de la clase padre (Mysql) para establecer la conexión con la base de datos.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Agrega un nuevo contrato a la base de datos.
     */
    public function agregarContrato(string $numero, string $administrador, string $descripcion, string $area, string $tipo, string $termino, string $maximo, string $fianza, string $estado, string $plataforma, string $devengo, string $fecha) {
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

        // Verifica si el contrato ya existe en la base de datos
        $sql = "SELECT * FROM contratos WHERE numero = '{$this->numero}'";
        $result = $this->select($sql);

        if (empty($result)) {
            // Si el contrato no existe, se inserta en la base de datos
            $query = "INSERT INTO contratos(numero, descripcion, area, administrador, tipo, termino, maximo, devengo, fianza, estado, plataforma, fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->numero, $this->descripcion, $this->area, $this->administrador, $this->tipo, $this->termino, $this->maximo, $this->devengo, $this->fianza, $this->estado, $this->plataforma, $this->fecha);
            $resul = $this->insert($query, $data);

            $return = $resul;
        } else {
            // Si el contrato ya existe, se devuelve un mensaje indicando que el contrato ya existe
            $return = "Contrato existente";
        }

        return $return;
    }

    /**
     * Selecciona todos los contratos de la base de datos.
     */
    public function selectContrato() {
        $sql = "SELECT * FROM contratos";
        $res = $this->select_all($sql);
        return $res;
    }

    /**
     * Obtiene los porcentajes de contratos agrupados por estado.
     */
    public function porcentajesCont() {
        $sql = "SELECT estado, COUNT(*) AS total FROM contratos GROUP BY estado";
        $res = $this->select_all($sql);
        return $res;
    }

    /**
     * Obtiene el total de contratos y la suma de los máximos de los contratos.
     */
    public function totalcontratos() {
        $sql = "SELECT COUNT(*) as total, SUM(maximo) as maximo FROM contratos";
        $res = $this->select_all($sql);
        return $res;
    }

    /**
     * Obtiene el número de contratos agrupados por tipo.
     */
    public function tipocontrato() {
        $sql = "SELECT COUNT(numero) as cont FROM contratos WHERE (tipo!='Conv. Monto') AND (tipo!='Conv. Vigencia')
                UNION
                SELECT COUNT(numero) as cont FROM contratos WHERE (tipo!='Por Monto') AND (tipo!='Por Vigencia')";
        $res = $this->select_all($sql);
        return $res;
    }

    /**
     * Obtiene la cantidad de contratos por plataforma y tipo de contrato (convocatoria o contrato).
     */
    public function tipoplatformaconv() {
        $sql = "SELECT plataforma, 
        SUM(CASE WHEN tipo IN ('Conv. Vigencia', 'Conv. Monto') THEN 1 ELSE 0 END) AS conv_count,
        SUM(CASE WHEN tipo IN ('Por Vigencia', 'Por Monto') THEN 1 ELSE 0 END) AS contr_count
        FROM contratos
        WHERE plataforma IN ('SAI', 'PREI')
        GROUP BY plataforma";
        $res = $this->select_all($sql);
        return $res;
    }
}
?>

