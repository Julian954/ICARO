<?php
    class ContratacionesModel extends Mysql
    {

        // Propiedades de la clase ContratosModel
        public $NoOficio, $Administrador, $Descripcion, $Contratacion, $Area, $Contrato, $Termino, $Maximo, $Dictamen, $Documento, $Inicio;

        //Llama al constructor de la clase padre (Mysql) para establecer la conexión con la base de datos.
        public function __construct()
        {
            parent::__construct();
        }

        //VISTA REGISTRO
        //Selecciona datos de usuario
        public function selectUsuario(string $usuario)
        {
            $this->usuario = $usuario;
            $sql = "SELECT * FROM usuarios WHERE id = '{$this->usuario}' AND estado=1";
            $res = $this->select($sql);
            return $res;
        }

        public function selectReq(string $usuario)
        {
            $this->usuario = $usuario;
            $sql = "SELECT * FROM validar_contrata WHERE id_contrato = '{$this->usuario}'";
            $res = $this->select($sql);
            return $res;
        }

        //Selecciona datos de usuario
        public function selectAdmin()
        {
            $sql = "SELECT * FROM usuarios WHERE estado=1 AND  rol =7";
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

        // Agrega un nuevo contrataciones a la base de datos.
        public function agregarContratacion(string $oficio, string $administrador, string $descripcion, string $contratacion, string $area, string $contrato, string $termino, string $maximo, string $dictamen, string $fecha_termina, string $categoria)
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
            $this->fecha_termina = $fecha_termina;
            $this->categoria = $categoria;

            // Verifica si el contrato ya existe en la base de datos
            $sql = "SELECT * FROM contrataciones WHERE nooficio = '{$this->oficio}'";
            $result = $this->select($sql);

            if (empty($result)) {
                // Si el contrato no existe, se inserta en la base de datos
                $query = "INSERT INTO contrataciones(nooficio, administrador, descripcion, contratacion, area, contrato, termino, maximo, dictamen, fecha_eliminar, categoria) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $data = array($this->oficio, $this->administrador, $this->descripcion, $this->contratacion, $this->area, $this->contrato, $this->termino, $this->maximo, $this->dictamen, $this->fecha_termina, $this->categoria);
                $resul = $this->insert($query, $data);
                $return = $resul;
            } else {
                // Si el contrato ya existe, se devuelve un mensaje indicando que el contrato ya existe
                $return = "existe";
            }
            return $return;
        }

        //Agrega los datos de la validación
        public function agregar_validar(string $number, string $descripcion, string $yo)
        {
            $return = "";
            $this->number = $number;
            $this->descripcion = $descripcion;
            $this->yo = $yo;

            $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->number}'";
            $result = $this->selecT($sql);

            if (empty($result)) {
                $query = "INSERT INTO validar_contrata(id_contrato, descripcion, id_creador) VALUES (?,?,?)";
                $data = array($this->number, $this->descripcion, $this->yo);
                $resul = $this->insert($query, $data);
                $return = $resul;
            } else {
                $return = "existe";
            }
            return $return;
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
        
        //VISTA GENERAL
        // Selecciona todos los contratos de la base de datos.
        public function selectContrataciones() {
            $sql = "SELECT contrataciones.*, usuarios.nombre FROM contrataciones, usuarios WHERE contrataciones.administrador = usuarios.id;";
            $res = $this->select_all($sql);
            return $res;
        }

        public function tipocontratoCns()
        {
            $sql = "SELECT categoria, COUNT(*) as total FROM contrataciones GROUP BY categoria";
            $res = $this->select_all($sql);
            return $res;
        }

        public function tipocontratacion()
        {
            $sql = "SELECT categoria, contrato, COUNT(*) as total FROM contrataciones GROUP BY categoria, contrato";
            $res = $this->select_all($sql);
            return $res;
        }

        public function SelectDictamen(){
            $sql = "SELECT * FROM dictamen";
            $res = $this->select_all($sql);
            return $res;
        }
        // Selecciona todos los contratos de la base de datos.
        public function porcentajesContrataciones()
        {
            $sql = "SELECT estado, CASE estado WHEN 1 THEN 'En Contratacion' WHEN 2 THEN 'En Validación' WHEN 3 THEN 'Validados' WHEN 4 THEN 'Formalizados' ELSE 'ERROR' END AS nombre, COUNT(*) AS total FROM contrataciones GROUP BY estado;";
            $res = $this->select_all($sql);
            return $res;
        }

        // Obtiene la cantidad de contratos por area totales y estado 4.
        public function PgsBarContrata()
        {
            $sql = "SELECT area, COUNT(*) AS total, SUM(CASE WHEN estado = 4 THEN 1 ELSE 0 END) AS form FROM contrataciones GROUP BY area";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los contratos de la base de datos.
        public function totalContrataciones()
        {
            $sql = "SELECT COUNT(*) as total, SUM(Maximo) as maximo FROM contrataciones";
            $res = $this->select($sql);
            return $res;
        }

        //VISTA VALIDANDO
        // Selecciona todos los contratos de la base de datos.
        public function selectContratosVal() {
            $sql = "SELECT validar_contrata.*, validar_contrata.id_validador AS validador, validar_contrata.id_creador AS creador, validar_contrata.id_contrato AS estado, u1.nombre as creador, u2.nombre as validador, c1.estado as estado FROM validar_contrata
                    JOIN usuarios u1 ON validar_contrata.id_creador = u1.id
                    JOIN contrataciones c1 ON validar_contrata.id_contrato = c1.nooficio
                    JOIN usuarios u2 ON validar_contrata.id_validador = u2.id";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los usuarios externos juridicos
        public function selectExternoJ() {
            $sql = "SELECT * FROM usuarios WHERE rol = 4";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los contratos en estado 1
        public function selectContratosEdo1() {
            $sql = "SELECT * FROM contrataciones WHERE estado = 1";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los contratos de la base de datos.
        public function selectContratosNo() {
            $sql = "SELECT validar_contrata.*, validar_contrata.id_creador AS creador, validar_contrata.id_contrato AS estado, u1.nombre as creador, c1.estado as estado FROM validar_contrata
                    JOIN usuarios u1 ON validar_contrata.id_creador = u1.id
                    JOIN contrataciones c1 ON validar_contrata.id_contrato = c1.nooficio";
            $res = $this->select_all($sql);
            return $res;
        }

        //actualizar estado de contrato
        public function actualizaEstado(int $estado, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE contrataciones SET estado = ? WHERE nooficio=?";       
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

        //actualizar estado de contrato
        public function actualizaResp(string $estado, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE validar_contrata SET id_validador = ? WHERE id_contrato=?";       
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

        //VISTA FORO
        // Selecciona los detalles del contrato
        public function selectContrato(string $contrato) {
            $this->contrato = $contrato;
            $sql = "SELECT * FROM validar_contrata, usuarios WHERE validar_contrata.id_contrato = '{$this->contrato}' AND validar_contrata.id_creador = usuarios.id";
            $res = $this->select($sql);
            return $res;
        }

        public function datos_foro(string $contrato){
           $this->contrato = $contrato;
           $sql = "SELECT * FROM detalle_contrata, usuarios WHERE detalle_contrata.contrato = '{$this->contrato}' AND detalle_contrata.id_responde = usuarios.id";
           $res = $this->select_all($sql);
               return $res;
        }

        public function archivos_foro(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT * FROM formatos WHERE contrato = '{$this->contrato}' AND tipo = 2";
            $res = $this->select_all($sql);
            return $res;
        }

        public function detalleContrato(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT * FROM contrataciones WHERE nooficio = '{$this->contrato}'";
            $res = $this->select($sql);
            return $res;
        }

        public function contarintento(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT COUNT(*) AS intentos FROM detalle_contrata WHERE contrato = '{$this->contrato}'";
            $res = $this->select($sql);
            return $res;
        }

        public function agregar_validar_comentarios(string $id_responde, string $contrato, string $respuesta, string $intento)
        {
            $return = "";        
            $this->id_responde = $id_responde;
            $this->contrato = $contrato;
            $this->respuesta = $respuesta;        
            $this->intento=$intento;           
            $query = "INSERT INTO detalle_contrata(id_responde, contrato, respuesta, intento) VALUES (?,?,?,?)";
            $data = array($this->id_responde, $this->contrato,$this->respuesta,$this->intento);
            $resul = $this->insert($query, $data);                          
            return $resul;
        }

        //actualizar intento de validar
        public function actualizarintento(string $intentos, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->intentos = $intentos;
            $query = "UPDATE validar_contrata SET intentos = ? WHERE id_contrato = ?";
            $data = array($this->intento, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

    }
?>

