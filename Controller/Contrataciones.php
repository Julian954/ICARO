<?php
    class Contrataciones extends Controllers
    {

        //YA QUEDÓ AL 100% YA NO SE NECESITA MOVER NADA

        //YA SOLO MÁS ADELANTE FALTA CREAR LA FUNCIÓN PARA ELIMINAR DIARIO, YA REVISÉ 
        //CUANDO SE TENGA EL HOSTING SE PUEDEN POGRAMAR FUNCIONES.

        // Inicia la sesión y verifica si el usuario está activo.
        // Si el usuario no está activo, redirige al inicio de sesión.
        // Llama al constructor de la clase padre (Controllers).
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: " . base_url());
            }
            parent::__construct();
        }

        // Muestra la vista "Registro" con los datos obtenidos de los modelos.
        public function Registro()
        {
            $data1 = $this->model->SelectAreas();
            $data2 = $this->model->SelectTipo();
            $data3 = $this->model->SelectPlataforma();
            $data4 = $this->model->SelectTipoContratacion();
            $data5 = $this-> model->SelectDictamen();

            $this->views->getView($this, "Registro", "", $data1, $data2, $data3, $data4, $data5);
        }

        // Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
        public function agregar()
        {
            if (isset($_POST['contrato'])) {
                $categoria = "Contrato";
            } else {
                $categoria = "Convenio";
            }
            $oficio = limpiarInput($_POST['NoOficio']);
            $administrador = limpiarInput($_SESSION['id']);
            $descripcion = limpiarInput($_POST['Descripcion']);
            $contratacion = limpiarInput($_POST['tipocontrata']);
            $area = limpiarInput($_POST['Area']);
            $contrato = limpiarInput($_POST['Contrato']);
            $termino = limpiarInput($_POST['Termino']);
            $maximo = limpiarInput($_POST['Maximo']);
            $dictamen = limpiarInput($_POST['Dictamen']);
            $comentario = limpiarInput($_POST['comentario']);
            $fecha_termina = date("Y-m-d", strtotime("+1 year"));

            $insert = $this->model->agregarContratacion($oficio, $administrador, $descripcion, $contratacion, $area, $contrato, $termino, $maximo, $dictamen, $fecha_termina, $categoria);
            if ($insert == 'existe') {
                $alert = 'existe';
                header("location: " . base_url() . "Contrataciones/Registro?msg=$alert");
            } else if ($insert > 0) {
                $validar = $this->model->agregar_validar($oficio, $comentario, $administrador);
                //Si se agrega te redirige a la vista "General" con un mensaje de alerta y se agrega documentos.
                //ESTA ES LA PARTE DE AGREGAR EL DOCUMENTO
                $i = 0;
                $tipo = 2;
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
                            $nombre_nuevo = $oficio . "0" . $administrador . $i . $tipo . "." . $name["extension"];
                            $ruta_destino = 'Assets/Documentos/Peticiones/' . $nombre_nuevo;
                            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                                $i = $i + 1;
                                $documento = $i;
                                $agregar = $this->model->agregar_pdf($oficio, $nombre_nuevo, 0, $tipo);
                            
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
                $data = $this->model->selectAdmin();
                $asunto = 'Creación de Requerimiento';
                foreach ($data as $admin) {
                    $correo = $admin['correo'];
                    $nombre = $admin['nombre'];
                    $msg = $_SESSION['nombre'].' HA CREADO EL REQUERIMIENTO '.$oficio.' Y ESTÁ ESPERANDO A QUE LE ASIGNES UN RESPONSABLE. <br><br>'.'PUEDES CONTACTARTE CON EL USUARIO MEDIANTE EL SIGUIENTE CORREO: '.$_SESSION['correo'];
                    correo($msg, $asunto, $correo, $nombre);
                }
                $alert = 'registrado';
                header("location: " . base_url() . "Contrataciones/General?msg=$alert&documento=$documento");
            } else {
                $alert = 'error';
                header("location: " . base_url() . "Contrataciones/Registro?msg=$alert");
            }
            die();
        }

        // Muestra la vista "Contratos_seguimiento" con los datos obtenidos de los modelos.
        public function General()
        {
            $data1 = $this->model->selectContrataciones();
            $data2 = $this->model->tipocontratoCns();
            $data3 = $this->model->tipocontratacion();
            $data4 = $this->model->porcentajesContrataciones();
            $data5 = $this->model->PgsBarContrata();
            $data6 = $this->model->totalContrataciones();
            $this->views->getView($this, "General", "", $data1, $data2, $data3, $data4, $data5, $data6);
        }

        //Datos para la gráfica de contratos
        public function GeneralRequerimientos()
        {
            $data = $this->model->porcentajesContrataciones();
            echo json_encode($data);
            die();
        }

        // Agrega contrato a validación
        public function Validando()
        {
            $data1 = $this->model->selectContratosVal();
            $data2 = $this->model->selectExternoJ();
            $data3 = $this->model->selectContratosEdo1();
            $data4 = $this->model->selectContratosNo();
            $this->views->getView($this, "Validando", "", $data1, $data2, $data3, $data4);
        }

        public function agregar_validadcont()
        {
            $tu = limpiarInput($_POST['miSelect1']);
            $number = limpiarInput($_POST['miSelect2']);
            $estadoN = 2;
            $estado = $this->model->actualizaEstado($estadoN, $number);
            $responsable = $this->model->actualizaResp($tu, $number);
            $alert = "agregado";

            //VALIDADOR
            $requerimiento = $this->model->selectReq($number);
            $VALIDA = $this->model->selectUsuario($requerimiento['id_validador']);
            $REQ = $this->model->selectUsuario($requerimiento['id_creador']);
            $asunto = 'Validador Asignado';
            $correo = $VALIDA['correo'];
            $nombre = $VALIDA['nombre'];
            $msg = 'TE HAN ASIGNADO COMO VALIDADOR DEL REQUERIMIENTO '.$number.'.<br><br>';
            correo($msg, $asunto, $correo, $nombre);
            //REQUIRIENTE
            $asunto2 = 'Validador Asignado';
            $correo2 = $REQ['correo'];
            $nombre2 = $REQ['nombre'];
            $msg2 = 'SE HA ASIGNADO A '.$VALIDA['nombre'].' COMO VALIDADOR DEL REQUERIMIENTO '.$number.'. EN EL QUE ESTÁS COMO REQUIRIENTE.<br><br>';
            correo($msg2, $asunto2, $correo2, $nombre2);

            header("location: " . base_url() . "Contrataciones/Validando?msg=$alert");
            die();
        }

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
                            $agregar= $this->model->agregar_pdf($number, $nombre_nuevo, $intento['intentos']+1, 2);
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
            if ($contrato['id_creador'] == $yo) {
                $data = $this->model->selectUsuario($contrato['id_validador']);
                $msg = $_SESSION['nombre'].' TE HA RESPONDIDO EN EL FORO DEL REQUERIMIENTO '.$number.'.<br><br>';
            } elseif ($contrato['id_validador'] == $yo) {
                $data = $this->model->selectUsuario($contrato['id_creador']);
                $msg = $_SESSION['nombre'].' TE HA RESPONDIDO EN EL FORO DEL REQUERIMIENTO '.$number.'.<br><br>';
            } else {
                $data = $this->model->selectUsuario($contrato['id_creador']);
                $msg = 'UN ADMINISTRADOR TE HA RESPONDIDO EN EL FORO DEL REQUERIMIENTO '.$number.'.<br><br>';
            }
                $asunto = 'Respuesta Foro';
                $correo = $data['correo'];
                $nombre = $data['nombre'];
                correo($msg, $asunto, $correo, $nombre);
            
            
            $alert =  'Registrado';              
            header("location: " . base_url() . "Contrataciones/Foro?contrato=$number&msg=$alert");
            die();
        }

        public function validar(){
            $number = limpiarInput($_GET['contrato']);
            $fecha_valida=$_POST['fecha_valida'];
            $estado = 3;
            $actualizar = $this->model->actualizaEstado($estado, $number);

                $requerimiento = $this->model->selectReq($number);
                $data = $this->model->selectUsuario($requerimiento['id_creador']);
                $msg = 'SE HA VALIDADO EL REQUERIMIENTO '.$number.'.<br><br>';
                $asunto = 'Validadción de Rquerimiento';
                $correo = $data['correo'];
                $nombre = $data['nombre'];
                correo($msg, $asunto, $correo, $nombre);

                $data = $this->model->selectAdmin();
                $asunto = 'Requerimiento por Formalizar';
                foreach ($data as $admin) {
                    $correo = $admin['correo'];
                    $nombre = $admin['nombre'];
                    $msg = $_SESSION['nombre'].' HA VALIDADO EL REQUERIMIENTO '.$oficio.' Y ESTÁ ESPERANDO A QUE LO FORMALICES. <br><br>'.'PUEDES CONTACTARTE CON EL USUARIO MEDIANTE EL SIGUIENTE CORREO: '.$_SESSION['correo'];
                    correo($msg, $asunto, $correo, $nombre);
                }

            header("location: " . base_url() . "Contrataciones/Foro?contrato=$number");
            die();
        }

        public function formalizar(){
            $number = limpiarInput($_GET['contrato']);
            $estado = 4;
            $actualizar = $this->model->actualizaEstado($estado, $number);

                $requerimiento = $this->model->selectReq($number);
                $data = $this->model->selectUsuario($requerimiento['id_creador']);
                $msg = 'SE HA FORMALIZADO EL REQUERIMIENTO '.$number.'.<br><br>';
                $asunto = 'Formalización de Rquerimiento';
                $correo = $data['correo'];
                $nombre = $data['nombre'];
                correo($msg, $asunto, $correo, $nombre);

            header("location: " . base_url() . "Contrataciones/Foro?contrato=$number");
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
            $conn->set_charset("utf8");
        
            // Consulta para obtener los datos de la tabla que deseas exportar (reemplaza 'nombre_de_tabla' con el nombre de tu tabla)
            $sql = "SELECT nooficio, administrador, categoria, descripcion, contratacion, area, contrato, termino, maximo, dictamen, estado, inicio, fecha_eliminar FROM contrataciones";
            $result = $conn->query($sql);
        
            // Crear un archivo CSV y escribir los datos en él
            $filename = "Requerimientos.csv";
            $file = fopen($filename, "w");
            if ($file) {
                // Escribir el encabezado del archivo CSV
                $header = array("No.Oficio", "Administrador", "Categoría", "Descripción", "Contratación", "Área", "Contrato", "Término", "Máximo", "Dictamen", "Estado", "Inicio", "Fecha de Eliminación");
                fputcsv($file, $header);
        
                // Escribir los datos de la tabla en el archivo CSV
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data = array($row['nooficio'], $row['administrador'], $row['categoria'], $row['descripcion'], $row['contratacion'], $row['area'], $row['contrato'], $row['termino'], $row['maximo'], $row['dictamen'], $row['estado'], $row['inicio'], $row['fecha_eliminar']);
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

