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


    // Selecciona todos los contratos de la base de datos.
    public function selectContratos() {
        $sql = "SELECT * FROM contratos";
        $res = $this->select_all($sql);
        return $res;
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

    // Selecciona todos los contratos de la base de datos.
    public function selectContratosVal() {
        $sql = "SELECT * FROM validar_cont";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los usuarios externos juridicos
    public function selectExternoJ() {
        $sql = "SELECT * FROM usuarios WHERE rol = 3";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los contratos en estado 1
    public function selectContratosEdo1() {
        $sql = "SELECT * FROM contratos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los contratos en estado 1
    public function selectContrato(string $contrato) {
        $this->contrato = $contrato;
        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->contrato}'";
        $res = $this->select($sql);
        return $res;
    }
    




    /**
     * Agrega un nuevo contrato a la base de datos.
     */
    public function agregarContrato(string $numero, string $descripcion, string $area, string $administrador, string $tipo, string $termino, string $maximo, string $fianza, string $estado, string $plataforma, string $devengo, string $fecha) {
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
     * Obtiene los porcentajes de contratos agrupados por estado.
     */
    public function porcentajesCont() {
        $sql = "SELECT estado, COUNT(*) AS total FROM contratos GROUP BY estado";
        $res = $this->select_all($sql);
        return $res;
    }
//query de validar_cont
    public function validar_cont(){
        $sql = "SELECT * FROM validar_cont";
        $res=$this->select_all($sql);
        return $res;
    }
    public function agregar_validar(string $number, string $descripcion, string $yo, string $tu)
    {
        $return = "";
        $this->tu = $tu;
        $this->number = $number;
        $this->descripcion = $descripcion;        
        $this->yo = $yo; 

        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->number}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO validar_cont(id_contrato, descripcion, id_creador, id_validador) VALUES (?,?,?,?)";
            $data = array($this->number, $this->descripcion, $this->yo, $this->tu);
            $resul = $this->insert($query, $data);
            
            $return = $resul;
        } else {
                $return = "Contrato existente";
        }
        
        return $return;
    }

    //Subir el archivo PDF a BD
    public function agregar_pdf(string $number, string $descripcion, string $yo, string $tu, string $nombre_archivo)
    {
        $return = "";
        $this->tu = $tu;
        $this->number = $number;
        $this->descripcion = $descripcion;        
        $this->yo = $yo;    
        $this->nombre_archivo = $nombre_archivo;
        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->number}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO validar_cont(id_contrato, descripcion, id_creador, id_validador, archivo) VALUES (?,?,?,?,?)";
            $data = array($this->number, $this->descripcion, $this->yo, $this->tu, $this->nombre_archivo);
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

    public function datosuser()
    {
        $ID = $_SESSION['id'];
        $sql="SELECT nombre as nom,correo as correo,telefono as phone,perfil as foto FROM usuarios WHERE id = $ID";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function PgsBarContr()
    {
        $sql = "SELECT COUNT(numero) as TCM FROM contratos WHERE area = 'Jefatura de Prestaciones Medicas'
                UNION ALL
                SELECT COUNT(numero) as TCM2 FROM contratos WHERE area = 'Jefatura de Prestaciones Medicas' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM3 FROM contratos WHERE area = 'Jefatura de Servicios Administrativos'
                UNION ALL
                SELECT COUNT(numero) as TCM4 FROM contratos WHERE area = 'Jefatura de Servicios Administrativos' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM5 FROM contratos WHERE area = 'Jefatura de Servicios Prestaciones Económicas'
                UNION ALL
                SELECT COUNT(numero) as TCM6 FROM contratos WHERE area = 'Jefatura de Servicios Prestaciones Económicas' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM7 FROM contratos WHERE area = 'Coordinación de Comuniación Social'
                UNION ALL
                SELECT COUNT(numero) as TCM8 FROM contratos WHERE area = 'Coordinación de Comuniación Social' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM9 FROM contratos WHERE area = 'Departamento de Conservación'
                UNION ALL
                SELECT COUNT(numero) as TCM10 FROM contratos WHERE area = 'Departamento de Conservación' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM11 FROM contratos WHERE area = 'Departamento de Servicios Generales'
                UNION ALL
                SELECT COUNT(numero) as TCM12 FROM contratos WHERE area = 'Departamento de Servicios Generales' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM13 FROM contratos WHERE area = 'Coordinación de Informática'
                UNION ALL
                SELECT COUNT(numero) as TCM14 FROM contratos WHERE area = 'Coordinación de Informática' AND estado = '4'
                UNION ALL
                SELECT COUNT(numero) as TCM15 FROM contratos WHERE area = 'Coordinación Biomédica'
                UNION ALL
                SELECT COUNT(numero) as TCM16 FROM contratos WHERE area = 'Coordinación Biomédica' AND estado = '4'";
        $res = $this->select_all($sql);
        return $res;
        
    }

    

}
?>

