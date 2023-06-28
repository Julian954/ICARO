<?php
    class Contratos extends Controllers {

        //YA QUEDÓ AL 100% YA NO SE NECESITA MOVER NADA

        //YA SOLO MÁS ADELANTE FALTA CREAR LA FUNCIÓN PARA ELIMINAR DIARIO, YA REVISÉ 
        //CUANDO SE TENGA EL HOSTING SE PUEDEN POGRAMAR FUNCIONES.

        // Inicia la sesión y verifica si el usuario está activo.
        // Si el usuario no está activo, redirige al inicio de sesión.
        // Llama al constructor de la clase padre (Controllers).
        public function __construct() {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: " . base_url());
            }
            parent::__construct();
        }

        // Muestra la vista "Registro" con los datos obtenidos de los modelos.
        public function Registro() {
            $data1 = $this->model->SelectAreas();
            $data2 = $this->model->SelectTipo();
            $data3 = $this->model->SelectPlataforma();
            $data4 = $this->model->usuario();
            $this->views->getView($this, "Registro", "", $data1, $data2, $data3, $data4);
        }

        // Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
        public function agregar() {
            if (isset($_POST['contrato'])) {
                $categoria = "Contrato";
            } else {
                $categoria = "Convenio";
            }
            $numero = limpiarInput($_POST['numero']);
            $descripcion = limpiarInput($_POST['descripcion']);
            $area = limpiarInput($_POST['area']);
            $requiriente = limpiarInput($_POST['requiriente']);
            $administrador = limpiarInput($_SESSION['id']);
            $tipo = limpiarInput($_POST['tipo']);
            $termino = limpiarInput($_POST['termino']);
            $maximo = limpiarInput($_POST['maximo']);
            $fianza = limpiarInput($_POST['fianza']);
            $plataforma = limpiarInput($_POST['plataforma']);
            $fecha_termina = date("Y-m-d", strtotime("+1 year"));
            $devengo = 0; // default

            $insert = $this->model->agregarContrato($numero, $descripcion, $area, $requiriente, $administrador, $tipo, $termino, $maximo, $fianza, $plataforma, $fecha_termina, $devengo, $categoria);
            if ($insert == 'existe') {
                $alert = 'existe';
                header("location: " . base_url() . "Contratos/Registro?msg=$alert");
            } else if ($insert > 0) {
                //Si se agrega te redirige a la vista "General" con un mensaje de alerta.
                $alert = 'registrado';
                header("location: " . base_url() . "Contratos/General?msg=$alert");
            } else {
                $alert = 'error';
                header("location: " . base_url() . "Contratos/Registro?msg=$alert");
            }
            die();
        }

        // Muestra la vista "General" con los datos obtenidos de los modelos.
        public function General() {
            $data1 = $this->model->selectContratos();
            $data2 = $this->model->EstadoContratos();
            $data3 = $this->model->totalcontratos();
            $data4 = $this->model->tipocontrato();
            $data5 = $this->model->tipoplatformaconv();
            $data6 = $this->model->PgsBarContr();       
        $this->views->getView($this, "General", "", $data1, $data2, $data3, $data4, $data5, $data6);
        }

        //Datos para la gráfica de contratos
        public function GeneralContratos()
        {
            $data = $this->model->EstadoContratos();
            echo json_encode($data);
            die();
        }

        // Muestra la vista "Validando" con los datos obtenidos de los modelos.
        public function Validando()
        {        
            $data1 =$this->model->selectContratosVal();
            $data2 =$this->model->selectExternoJ();
            $data3 =$this->model->selectContratosEdo1();
            $this->views->getView($this, "Validando", "", $data1, $data2, $data3);
        }

        // Agrega contrato a validación
        public function agregar_validadcont()
        {
            $tu = limpiarInput($_POST['miSelect1']);
            $descripcion = limpiarInput($_POST['descripcion']);        
            $yo = $_SESSION['id'];
            $number =limpiarInput($_POST['miSelect2']);
            $insert = $this->model->agregar_validar( $number, $descripcion, $yo, $tu);
            if ($insert == 'existe') {
                $alert = 'existe';
                header("location: " . base_url() . "Contratos/Validando?msg=$alert");
            } else if ($insert > 0) {
                //Si se agrega te redirige a la vista "Validando" con un mensaje de alerta y se agrega documentos.
                //ESTA ES LA PARTE DE AGREGAR EL DOCUMENTO
                $i = 0;
                $tipo = 1;
                $archivos = $_FILES['archivo'];
                
                foreach ($archivos["name"] as $indice => $nombre) {
                    $name = pathinfo($archivos["name"][$indice]);
                    $nombre_archivo = $archivos["name"][$indice];
                    $tipo_archivo = $archivos["type"][$indice];
                    $tamano_archivo = $archivos["size"][$indice];
                    $ruta_temporal = $archivos["tmp_name"][$indice];
                    $error_archivo = $archivos["error"][$indice];
                    $tmaximo = 20 * 1024 * 1024;
                
                    if (($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf" || $name["extension"] == "docx" || $name["extension"] == "zip" || $name["extension"] == "xlsx")) {
                        if ($error_archivo == UPLOAD_ERR_OK) {
                            $nombre_nuevo = $number . "0" . $yo . $i . $tipo . "." . $name["extension"];
                            $ruta_destino = 'Assets/Documentos/Peticiones/' . $nombre_nuevo;
                            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                                $i = $i + 1;
                                $documento = $i;
                                $agregar = $this->model->agregar_pdf($number, $nombre_nuevo, 0, $tipo);
                                $estado = 2;
                                $actualizar = $this->model->actualizaEstado($estado, $number);
                            } else {
                                $documento = 'mover';
                            }
                        } else {
                            $documento = 'archivo';
                        
                        }
                    } else {
                        $documento = 'formato';
                    }
                }
                $alert = 'registrado';
                header("location: " . base_url() . "Contratos/Validando?msg=$alert&documento=$documento");
            } else {
                $alert = 'error';
                header("location: " . base_url() . "Contratos/Validando?msg=$alert");
            }
            die();
        }

        // Muestra la vista "Foro" con los datos obtenidos de los modelos.
        public function Foro()
        {
            $contrato = $_GET['contrato'];       
            $data1 = $this->model->selectContrato($contrato);
            $data2 = $this->model->datos_foro($contrato);
            $data3 = $this->model->archivos_foro($contrato);
            $data4 = $this->model->detalleContrato($contrato);
            $this->views->getView($this, "Foro", "", $data1, $data2, $data3, $data4);
        }

        // Añade un comentario en el foro
        public function agregar_comentario(string $contrato)
        {
            $descripcion = limpiarInput($_POST['descripcion']);        
            $yo = $_SESSION['id'];   
            $number = limpiarInput($_POST['number']);
            $intento = $this->model->contarintento($number);
            $insert = $this->model->agregar_validar_comentarios($yo, $number, $descripcion, $intento['intentos']+1);
            $contrato = $this->model->selectContrato($number);
            if ($contrato['id_creador'] == $yo || $_SESSION['rol'] == 7) {
                $sumar = $this->model->actualizarintento($contrato['intentos']+2, $number);
            }
            $i = 0;
            $intentonuevo = $intento['intentos']+1;
            $archivos = $_FILES['archivo'];
            foreach ($archivos["name"] as $indice => $nombre) {

                $name = pathinfo($archivos["name"][$indice]);
                $nombre_archivo = $archivos["name"][$indice];        
                $tipo_archivo = $archivos["type"][$indice];
                $tamano_archivo = $archivos["size"][$indice];
                $ruta_temporal = $archivos["tmp_name"][$indice];
                $error_archivo = $archivos["error"][$indice];
                $tmaximo = 20 * 1024 * 1024;
                if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf" || $name["extension"] == "docx" || $name["extension"] == "zip" || $name["extension"] == "xlsx")){
                    if ($error_archivo == UPLOAD_ERR_OK ) {
                        $nombre_nuevo = $number.$intentonuevo.$yo.$i.".".$name["extension"];                                
                        $ruta_destino = 'Assets/Documentos/Foro/'.$nombre_nuevo;
                        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                            $i=$i+1;
                            $alert=$i;            
                            $agregar= $this->model->agregar_pdf($number, $nombre_nuevo, $intento['intentos']+1, 1);
                        } else {
                            $alert =  'NoArchivo';
                        }
                    } else {
                    $alert =  'NoArchivo';

                    }
                } else {
                    $alert =  'NoArchivo';
                }
            }          
            $alert =  'Registrado';              
            header("location: " . base_url() . "Contratos/Foro?contrato=$number&msg=$alert");
            die();
        }

        public function validar(){
            $number = limpiarInput($_GET['contrato']);
            $fecha_valida=$_POST['fecha_valida'];
            $estado = 3;
            $actualizar = $this->model->actualizaEstado($estado, $number, $fecha_valida);
            header("location: " . base_url() . "Contratos/Foro?contrato=$number");
            die();
        }

        public function formalizar(){
            $number = limpiarInput($_GET['contrato']);
            $estado = 4;
            $actualizar = $this->model->actualizaEstado($estado, $number);
            header("location: " . base_url() . "Contratos/Foro?contrato=$number");
            die();
        }

        public function eliminarano(){
            
            $data1 =$this->model->select_eliminar_validarcont();
            $data2 =$this->model->select_eliminar_detallecont();
            
            $archivo = opendir('Assets/Documentos/Peticiones/');                 
            $archivo2 = opendir('Assets/Documentos/Foro/');    
            foreach ($data1 as $row) {  
            }
            while ($elemento = readdir($archivo)) {
                if ($row['archivo']!=$elemento) {
                    @unlink('Assets/Documentos/Peticiones/'.$elemento);
                }
            }            
            foreach ($data2 as $row2) {  
            }
            while ($elemento2 = readdir($archivo2))   {
                if ($row2['archivo']!=$elemento2) {
                    @unlink('Assets/Documentos/Foro/'.$elemento2);
                }
            }
            die();
        }

        public function DescargarArchivo(){
            // Conectarse a la base de datos (reemplaza los valores con los de tu base de datos)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "imss";
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error al conectar a la base de datos: " . $conn->connect_error);
            }
        
            // Establecer la codificación de caracteres
            $conn->set_charset("utf8mb4");
        
            // Consulta para obtener los datos de la tabla que deseas exportar (reemplaza 'nombre_de_tabla' con el nombre de tu tabla)
            $sql = "SELECT numero, descripcion, area, administrador, categoria, tipo, termino, maximo, fianza, estado, plataforma, devengo, fecha, fecha_eliminar FROM contratos";
            $result = $conn->query($sql);
        
            // Crear un archivo CSV y escribir los datos en él
            $filename = "Contratos.csv";
            $file = fopen($filename, "w");
            if ($file) {
                // Escribir el encabezado del archivo CSV
                $header = array("No.Contrato", "Descripcion", "Area", "Administrador", "Categoria", "Tipo", "Termino", "Maximo", "Fianza", "Estado", "Plataforma", "Devengo", "Fecha de Creacion", "Fecha de Eliminacion");
                fputcsv($file, $header);
        
                // Escribir los datos de la tabla en el archivo CSV
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Reemplaza 'columna1', 'columna2', 'columna3' con los nombres de tus columnas de la tabla
                        $data = array($row['numero'], $row['descripcion'], $row['area'], $row['administrador'], $row['categoria'], $row['tipo'], $row['termino'], $row['maximo'], $row['fianza'], $row['estado'], $row['plataforma'], $row['devengo'], $row['fecha'], $row['fecha_eliminar']);
                        fputcsv($file, $data);
                    }
                }
        
                fclose($file);
        
                // Descargar el archivo CSV
                header('Content-Type: application/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Content-Length: ' . filesize($filename));
                readfile($filename);
            } else {
                echo "Error al crear el archivo CSV.";
            }
        
            $conn->close();
        }

        
        
    }
?>

