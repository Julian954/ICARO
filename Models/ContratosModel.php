<?php
    class ContratosModel extends Mysql {

        //YA QUEDÓ AL 100% YA NO SE NECESITA MOVER NADA

        // Propiedades de la clase ContratosModel
        public $numero, $descripcion, $administrador, $area, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha;

        //Llama al constructor de la clase padre (Mysql) para establecer la conexión con la base de datos.
        public function __construct() {
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

        //Selecciona datos de usuario
        public function selectAdmin()
        {
            $sql = "SELECT * FROM usuarios WHERE estado=1 AND  rol =7";
            $res = $this->select_all($sql);
            return $res;
        }

        //Selecciona datos de usuario
        public function selectReq(string $usuario)
        {
            $this->usuario = $usuario;
            $sql = "SELECT * FROM validar_cont WHERE id_contrato = '{$this->usuario}'";
            $res = $this->select($sql);
            return $res;
        }

        //Selecciona datos de usuario
        public function cont(string $usuario)
        {
            $this->usuario = $usuario;
            $sql = "SELECT * FROM contratos WHERE numero = '{$this->usuario}'";
            $res = $this->select($sql);
            return $res;
        }

        //Selecciona datos de usuario
        public function selectContratoC(string $usuario)
        {
            $this->usuario = $usuario;
            $sql = "SELECT * FROM contratos WHERE numero = '{$this->usuario}'";
            $res = $this->select($sql);
            return $res;
        }

        //Selecciona las áreas
        public function SelectAreas()
        {
            $sql = "SELECT * FROM areas";
            $res = $this->select_all($sql);
            return $res;
        }

        public function usuario()
        {
            $sql = "SELECT * FROM usuarios WHERE rol = 2";
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

        // Agrega un nuevo contrato a la base de datos.
        public function agregarContrato(string $numero, string $descripcion, string $area, string $requiriente, string $administrador, string $tipo, string $termino, string $maximo, string $fianza, string $plataforma, string $fecha_termina, string $devengo, string $categoria) {
            $return = "";
            $this->numero = $numero;
            $this->descripcion = $descripcion;
            $this->area = $area;
            $this->requiriente = $requiriente;
            $this->administrador = $administrador;
            $this->tipo = $tipo;
            $this->termino = $termino;
            $this->maximo = $maximo;
            $this->devengo = $devengo;
            $this->fianza = $fianza;
            $this->plataforma = $plataforma;
            $this->fecha_termina = $fecha_termina;
            $this->categoria = $categoria;

            // Verifica si el contrato ya existe en la base de datos
            $sql = "SELECT * FROM contratos WHERE numero = '{$this->numero}'";
            $result = $this->select($sql);

            if (empty($result)) {
                // Si el contrato no existe, se inserta en la base de datos
                $query = "INSERT INTO contratos(numero, descripcion, area, requiriente, administrador, tipo, termino, maximo, devengo, fianza, plataforma, fecha_eliminar, categoria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $data = array($this->numero, $this->descripcion, $this->area,$this->requiriente, $this->administrador, $this->tipo, $this->termino, $this->maximo, $this->devengo, $this->fianza, $this->plataforma, $this->fecha_termina, $this->categoria);
                $resul = $this->insert($query, $data);
                $return = $resul;
            } else {
                // Si el contrato ya existe, se devuelve un mensaje indicando que el contrato ya existe
                $return = "existe";
            }
            return $return;
        }
    
        //VISTA GENERAL
        // Selecciona todos los contratos de la base de datos.
        public function selectContratos() {
            $sql = "SELECT contratos.*, usuarios.nombre FROM contratos, usuarios WHERE contratos.administrador = usuarios.id;";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los contratos de la base de datos.
        public function EstadoContratos()
        {
            $sql = "SELECT estado, CASE estado WHEN 1 THEN 'En Contratacion' WHEN 2 THEN 'En Validación' WHEN 3 THEN 'Validados' WHEN 4 THEN 'Formalizados' ELSE 'ERROR' END AS nombre, COUNT(*) AS total FROM contratos GROUP BY estado";
            $res = $this->select_all($sql);
            return $res;
        }

        public function chart_pies()
        {
            $sql = "SELECT SUM(contratos.devengo) AS devengo, (SUM(contratos.maximo)- SUM(contratos.devengo)) AS total FROM contratos WHERE contratos.estado = 4;";
            $res = $this->select_all($sql);
            return $res;
        }

        public function chart_pie2s()
        {
            $sql = "SELECT SUM(contratos.devengo) AS devengo, (SUM(contratos.maximo)-SUM(contratos.devengo)) AS total FROM contratos";
            $res = $this->select_all($sql);
            return $res;
        }


        // Obtiene el total de contratos y la suma de los máximos de los contratos.
        public function totalcontratos() {
            $sql = "SELECT COUNT(*) as total, SUM(maximo) as maximo FROM contratos";
            $res = $this->select($sql);
            return $res;
        }

        // Obtiene el número de contratos agrupados por tipo.
        public function tipocontrato() {
            $sql = "SELECT categoria, COUNT(*) as total FROM contratos GROUP BY categoria";
            $res = $this->select_all($sql);
            return $res;
        }

        // Obtiene la cantidad de contratos por plataforma y tipo de contrato (convocatoria o contrato).
        public function tipoplatformaconv() {
            $sql = "SELECT categoria, tipo, COUNT(*) as total FROM contratos GROUP BY categoria, tipo";
            $res = $this->select_all($sql);
            return $res;
        }

        // Obtiene la cantidad de contratos por area totales y estado 4.
        public function PgsBarContr()
        {
            $sql = "SELECT area, COUNT(*) AS total, SUM(CASE WHEN estado = 4 THEN 1 ELSE 0 END) AS form FROM contratos GROUP BY area";
            $res = $this->select_all($sql);
            return $res;
        }

        //VISTA VALIDANDO
        // Selecciona todos los contratos de la base de datos.
        public function selectContratosVal() {
            $sql = "SELECT validar_cont.*, validar_cont.id_validador AS validador, validar_cont.id_creador AS creador, validar_cont.id_contrato AS estado, u1.nombre as creador, u2.nombre as validador, c1.estado as estado FROM validar_cont
                    JOIN usuarios u1 ON validar_cont.id_creador = u1.id
                    JOIN contratos c1 ON validar_cont.id_contrato = c1.numero
                    JOIN usuarios u2 ON validar_cont.id_validador = u2.id";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los usuarios externos juridicos
        public function selectExternoJ() {
            $sql = "SELECT * FROM usuarios WHERE rol = 3";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los usuarios externos juridicos
        public function selectInternoJ() {
            $sql = "SELECT * FROM usuarios WHERE rol = 4";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los contratos en estado 1
        public function selectContratosEdo1() {
            $sql = "SELECT * FROM contratos WHERE estado = 1";
            $res = $this->select_all($sql);
            return $res;
        }

        //Añade validación
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
                    $return = "existe";
            }
            return $return;
        }

        //Subir la ruta de archivo a BD
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

        //actualizar estado de contrato
        public function actualizaEstado(int $estado, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE contratos SET contratos.estado = ? WHERE numero=?";       
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

        //VISTA FORO
        // Selecciona los detalles del contrato
        public function selectContrato(string $contrato) {
            $this->contrato = $contrato;
            $sql = "SELECT * FROM validar_cont, usuarios WHERE validar_cont.id_contrato = '{$this->contrato}' AND validar_cont.id_creador = usuarios.id";
            $res = $this->select($sql);
            return $res;
        }

        public function datos_foro(string $contrato){
           $this->contrato = $contrato;
           $sql = "SELECT * FROM detalle_cont, usuarios WHERE detalle_cont.contrato = '{$this->contrato}' AND detalle_cont.id_responde = usuarios.id";
           $res = $this->select_all($sql);
               return $res;
        }

        public function archivos_foro(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT * FROM formatos WHERE contrato = '{$this->contrato}' AND tipo = 1";
            $res = $this->select_all($sql);
            return $res;
        }

        public function detalleContrato(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT * FROM contratos WHERE numero = '{$this->contrato}'";
            $res = $this->select($sql);
            return $res;
        }

        public function contarintento(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT COUNT(*) AS intentos FROM detalle_cont WHERE contrato = '{$this->contrato}'";
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
            $query = "INSERT INTO detalle_cont(id_responde, contrato, respuesta, intento) VALUES (?,?,?,?)";
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
            $query = "UPDATE validar_cont SET intentos = ? WHERE id_contrato = ?";
            $data = array($this->intento, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

        
        //compara los archivos de la BD para eliminar los que no existen alla
        public function select_eliminar_validarcont(){
            $sql = "SELECT archivo FROM validar_cont";
            $res = $this->select_all($sql);
            return $res;
        }
        public function select_eliminar_detallecont(){
            $sql = "SELECT archivo FROM detalle_cont";
            $res = $this->select_all($sql);
            return $res;
        }

        // Agrega un nuevo contrato a la base de datos.
        public function notifica(string $asunto, string $mensaje, string $usuario) {
            $return = "";
            $this->asunto = $asunto;
            $this->mensaje = $mensaje;
            $this->usuario = $usuario;

            $query = "INSERT INTO notificaciones(asunto, mensaje, usuario) VALUES (?,?,?)";
            $data = array($this->asunto, $this->mensaje, $this->usuario);
            $resul = $this->insert($query, $data);
            $return = $resul;

            return $return;
        }
        //actualizar devengo
        public function actualizadevengo(int $devengo, string $contrato)
        {
            $return = "";
            $this->contrato = $contrato;
            $this->devengo = $devengo;
            $query = "UPDATE contratos SET devengo = ? WHERE numero=?";       
            $data = array($this->devengo, $this->contrato);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }

    public function actfecha(string $fecha)
    {
        $this->fecha = $fecha;
        $query = "UPDATE configuracion SET fecha=? WHERE id=3";
        $data = array($this->fecha);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

        public function devengo(){
            $sql = "SELECT * FROM configuracion WHERE id=3";
            $res = $this->select($sql);
            return $res;
        }

    }
?>

