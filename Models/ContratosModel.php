<?php
    class ContratosModel extends Mysql {

        // Propiedades de la clase ContratosModel
        public $numero, $descripcion, $administrador, $area, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha;

        //Llama al constructor de la clase padre (Mysql) para establecer la conexión con la base de datos.
        public function __construct() {
            parent::__construct();
        }

        //VISTA REGISTRO
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

        // Agrega un nuevo contrato a la base de datos.
        public function agregarContrato(string $numero, string $descripcion, string $area, string $administrador, string $tipo, string $termino, string $maximo, string $fianza, string $plataforma, string $fecha_termina, string $devengo) {
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
            $this->plataforma = $plataforma;
            $this->fecha_termina=$fecha_termina;

            // Verifica si el contrato ya existe en la base de datos
            $sql = "SELECT * FROM contratos WHERE numero = '{$this->numero}'";
            $result = $this->select($sql);

            if (empty($result)) {
                // Si el contrato no existe, se inserta en la base de datos
                $query = "INSERT INTO contratos(numero, descripcion, area, administrador, tipo, termino, maximo, devengo, fianza, plataforma, fecha_eliminar) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $data = array($this->numero, $this->descripcion, $this->area, $this->administrador, $this->tipo, $this->termino, $this->maximo, $this->devengo, $this->fianza, $this->plataforma, $this->fecha_termina);
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
            $sql = "SELECT estado, CASE estado WHEN 1 THEN 'En Contratacion' WHEN 2 THEN 'En Validación' WHEN 3 THEN 'Validados' WHEN 4 THEN 'Formalizados' ELSE 'ERROR' END AS nombre, COUNT(*) AS total FROM contratos GROUP BY estado;";
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
            $sql = "SELECT COUNT(numero) as cont FROM contratos WHERE (tipo!='Conv. Monto') AND (tipo!='Conv. Vigencia')
                    UNION
                    SELECT COUNT(numero) as cont FROM contratos WHERE (tipo!='Por Monto') AND (tipo!='Por Vigencia')";
            $res = $this->select_all($sql);
            return $res;
        }

        // Obtiene la cantidad de contratos por plataforma y tipo de contrato (convocatoria o contrato).
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

        // Obtiene la cantidad de contratos por area totales y estado 4.
        public function PgsBarContr()
        {
            $sql = "SELECT area, COUNT(*) AS total, SUM(CASE WHEN estado = 4 THEN 1 ELSE 0 END) AS form FROM contratos GROUP BY area";
            $res = $this->select_all($sql);
            return $res;
        }





        // Selecciona todos los contratos de la base de datos.
        public function selectContratosVal() {
            $sql = "SELECT validar_cont.id, validar_cont.id_contrato, validar_cont.descripcion, validar_cont.intentos, validar_cont.fecha, validar_cont.id_validador AS id_validador, validar_cont.id_creador AS id_creador, u1.nombre as id_creador, u2.nombre as id_validador FROM validar_cont
                    JOIN usuarios u1 ON validar_cont.id_creador = u1.id
                    JOIN usuarios u2 ON validar_cont.id_validador = u2.id;";
            $res = $this->select_all($sql);
            return $res;
        }

        // Selecciona todos los usuarios externos juridicos
        public function selectExternoJ() {
            $sql = "SELECT * FROM usuarios";
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
        public function selectContrato(string $contrato) { //me marca error cuando agrego comentarios en el modal de Foro.php
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

         public function contarintento(string $contrato){
            $this->contrato = $contrato;
            $sql = "SELECT COUNT(*) AS intentos FROM detalle_cont WHERE contrato = '{$this->contrato}'";
            $res = $this->select($sql);
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
        public function pedir_datos()
        {
            $sql = "SELECT * FROM validar_cont";
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



        public function agregar_foro(string $number, string $yo, string $tu)
        {
            $return = "";
            $this->tu = $tu;
            $this->number = $number;               
            $this->yo = $yo;                         
                $query = "INSERT INTO detalle_cont(observacion, id_validacion, id_responde,nombre_interno, nombre_externo) VALUES (?,?,?,?,?)";
                $data = array($this->number, $this->yo, $this->tu, $this->yo, $this->tu);
                $resul = $this->insert($query, $data);                        
        }

        /*public function pedir_datos()
        {
            $sql = "SELECT * FROM validar_cont";
            $res = $this->select_all($sql);
            return $res;
        }*/

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

        public function actualizaEstado4(int $estado, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE validar_cont SET validar_cont.estado = ? WHERE id_contrato=?";       
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }
        //actualizar intento de validar
        public function actualizarintento(int $intentos, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->intentos = $intentos;
            $query = "UPDATE validar_cont SET intentos = ? WHERE id_contrato=?";
            $data = array($this->intento, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
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
}
?>

