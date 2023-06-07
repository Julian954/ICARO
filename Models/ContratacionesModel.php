<?php

class ContratacionesModel extends Mysql
{

    /**
     * Propiedades de la clase ContratosModel
     */
    public $NoOficio, $Administrador, $Descripcion, $Contratacion, $Area, $Contrato, $Termino, $Maximo, $Dictamen, $Documento, $Inicio;

    /**
     * Constructor de la clase ContratosModel
     * Llama al constructor de la clase padre (Mysql) para establecer la conexión con la base de datos.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function selectContrataciones()
    {
        $sql = "SELECT * FROM contrataciones";
        $res = $this->select_all($sql);
        return $res;
    }

    //Subir el archivo PDF a BD
    public function agregar_pdf(string $contrato, string $nombre, string $intento, string $tipo)
    {
        $return = "";
        $this->contrato = $contrato;
        $this->nombre = $nombre;
        $this->intento = $intento;
        $this->tipo = $tipo;

        $query = "INSERT INTO formatos(contrato, nombre, intento, tipo) VALUES (?,?,?,?)";
        $data = array($this->contrato, $this->nombre, $this->intento, $this->tipo);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    // Selecciona todos los contratos de la base de datos.
    public function totalContrataciones()
    {
        $sql = "SELECT COUNT(*) as total, SUM(Maximo) as maximo FROM contrataciones";
        $res = $this->select_all($sql);
        return $res;
    }

    public function PgsBarContrata()
    {
        $sql = "SELECT Area, COUNT(*) AS total, SUM(CASE WHEN Estado = 4 THEN 1 ELSE 0 END) AS form FROM contrataciones GROUP BY Area";
        $res = $this->select_all($sql);
        return $res;

    }

    public function tipocontratoCns()
    {
        $sql = "SELECT COUNT(NoOficio) as cont FROM contrataciones WHERE (contrato!='Conv. Monto') AND (contrato!='Conv. Vigencia')
                UNION
                SELECT COUNT(NoOficio) as cont FROM contrataciones WHERE (contrato!='Por Monto') AND (contrato!='Por Vigencia')";
        $res = $this->select_all($sql);
        return $res;
    }

    public function tipocontratacion()
    {
        $sql = "SELECT Contratacion, 
        SUM(CASE WHEN Contrato IN ('Conv. Vigencia', 'Conv. Monto') THEN 1 ELSE 0 END) AS conv_count,
        SUM(CASE WHEN Contrato IN ('Por Vigencia', 'Por Monto') THEN 1 ELSE 0 END) AS contr_count
        FROM contrataciones
        WHERE Contratacion IN ('Alineamiento', 'Disposicion')
        GROUP BY Contratacion";
        $res = $this->select_all($sql);
        return $res;
    }

    public function porcentajesContrataciones()
    {
        $sql = "SELECT estado, COUNT(*) AS total FROM contrataciones GROUP BY estado";
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

    public function SelectTipoContratacion()
    {
        $sql = "SELECT * FROM tipocontrata";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los contratos de la base de datos.
    public function selectContratosVal()
    {
        $sql = "SELECT * FROM validar_cont";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los usuarios externos juridicos
    public function selectExternoJ()
    {
        $sql = "SELECT * FROM usuarios";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los contratos en estado 1
    public function selectContratosEdo1()
    {
        $sql = "SELECT * FROM contratos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    // Selecciona todos los contratos en estado 1
    public function selectContrato(string $contrato)
    { //me marca error cuando agrego comentarios en el modal de Foro.php
        $this->contrato = $contrato;
        $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->contrato}'";
        $res = $this->select($sql);
        return $res;
    }

    public function datos_foro()
    {
        $sql = "SELECT * FROM detalle_cont";
        $res = $this->select_all($sql);
        return $res;
    }



    /**
     * Agrega un nuevo contrato a la base de datos.
     */
    public function agregarContratacion(string $oficio, string $administrador, string $descripcion, string $contratacion, string $area, string $contrato, string $termino, string $maximo, string $dictamen)
    {
        $return = "";
        $this->oficio = $oficio;
        $this->administrador = $administrador;
        $this->descripcion = $descripcion;
        $this->contratacion = $contratacion;
        $this->area = $area;
        $this->contrato = $contrato;
        $this->termino = $termino;
        $this->maximo = $maximo;
        $this->dictamen = $dictamen;


        // Verifica si el contrato ya existe en la base de datos
        $sql = "SELECT * FROM contrataciones WHERE NoOficio = '{$this->oficio}'";
        $result = $this->select($sql);

        if (empty($result)) {
            // Si el contrato no existe, se inserta en la base de datos
            $query = "INSERT INTO contrataciones(NoOficio, Administrador, Descripcion, Contratacion, Area, Contrato, Termino, Maximo, Dictamen) VALUES (?,?,?,?,?,?,?,?,?)";
            $data = array($this->oficio, $this->administrador, $this->descripcion, $this->contratacion, $this->area, $this->contrato, $this->termino, $this->maximo, $this->dictamen);
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
    //query de validar_cont
    public function validar_cont()
    {
        $sql = "SELECT * FROM validar_cont";
        $res = $this->select_all($sql);
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

}
?>