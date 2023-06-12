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

            $this->views->getView($this, "Registro", "", $data1, $data2, $data3, $data4);
        }

        // Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
        public function agregar()
        {
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

            $insert = $this->model->agregarContratacion($oficio, $administrador, $descripcion, $contratacion, $area, $contrato, $termino, $maximo, $dictamen, $fecha_termina);
            $validar = $this->model->agregar_validar($oficio, $comentario, $administrador);
            if ($insert == 'existe') {
                $alert = 'existe';
                header("location: " . base_url() . "Contrataciones/Registro?msg=$alert");
            } else if ($insert > 0) {
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
            $name = pathinfo($_FILES["archivo"]["name"]);
            $nombre_archivo = $_FILES["archivo"]["name"];
            $tipo_archivo = $_FILES["archivo"]["type"];
            $tamano_archivo = $_FILES["archivo"]["size"];
            $ruta_temporal = $_FILES["archivo"]["tmp_name"];
            $error_archivo = $_FILES["archivo"]["error"];
            $tmaximo = 20 * 1024 * 1024;
            $tu = $_POST['miSelect1'];
            //$me=$_POST['yo'];
            //$numero = $_POST['miSelect2'];
            $descripcion = $_POST['descripcion'];
            $yo = $_SESSION['nombre'];
            $number = $_POST['miSelect2'];
            //$nombre_archi=$_POST['archivo'];   
            //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
            if (($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")) {
                if ($error_archivo == UPLOAD_ERR_OK) {
                    $nombre_nuevo = $_SESSION['id'] . "." . $name["extension"];
                    $ruta_destino = 'Assets/Documentos/' . $nombre_nuevo;
                    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                        $alert = 'Registrado';
                        $agregar = $this->model->agregar_pdf($number, $descripcion, $yo, $tu, $nombre_archivo);
                        //ingreso los datos de contraro, interno y externo para referenciar en el foro
                        $agregar_foro = $this->model->agregar_foro($number, $yo, $tu);
                    } else {
                        $alert = 'No Se Adjunto Archivo';
                        $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
                        $agregar_foro = $this->model->agregar_foro($number, $yo, $tu);
                    }
                } else {
                    $alert = 'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
                    $agregar_foro = $this->model->agregar_foro($number, $yo, $tu);
                }
            } else {
                $alert = 'No Se Adjunto Archivo';
                $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
                $agregar_foro = $this->model->agregar_foro($number, $yo, $tu);
            }
            header("location: " . base_url() . "Contratos/Validando?msg=$alert");
            die();
        }
        //descargar el pdf del historial en la conversacion del Foro
        public function get_pdf()
        {

        }

        public function Foro()
        {
            $contrato = $_GET['contrato'];
            $data1 = $this->model->selectContrato($contrato);
            $data2 = $this->model->datos_foro();
            $this->views->getView($this, "Foro", "", $data1, $data2);
        }


        public function agregar_comentario(string $contrato)
        {
            //$contrato = $_POST['number']; 
            $name = pathinfo($_FILES["archivo"]["name"]);
            $nombre_archivo = $_FILES["archivo"]["name"];
            $tipo_archivo = $_FILES["archivo"]["type"];
            $tamano_archivo = $_FILES["archivo"]["size"];
            $ruta_temporal = $_FILES["archivo"]["tmp_name"];
            $error_archivo = $_FILES["archivo"]["error"];
            $tmaximo = 20 * 1024 * 1024;
            $tu = $_POST['tu'];
            $number = $_POST['number'];
            //$me=$_POST['yo'];
            //$numero = $_POST['miSelect2'];
            $descripcion = $_POST['descripcion'];
            $yo = $_POST['yo'];
            $rol = $_SESSION['rol'];
            //$nombre_archi=$_POST['archivo'];   
            //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
            if (($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")) {
                if ($error_archivo == UPLOAD_ERR_OK) {
                    $nombre_nuevo = $_SESSION['id'] . "." . $name["extension"];
                    $ruta_destino = 'Assets/Documentos/' . $nombre_nuevo;
                    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                        $alert = 'Registrado';
                        $agregar = $this->model->agregar_comentarios_pdf($tu, $yo, $number, $descripcion, $nombre_archivo, $rol);
                        //ingreso los datos de contraro, interno y externo para referenciar en el foro
                        //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                    } else {
                        $alert = 'No Se Adjunto Archivo';
                        $insert = $this->model->agregar_validar_comentarios($tu, $yo, $number, $descripcion, $rol);
                        //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                    }
                } else {
                    $alert = 'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar_comentarios($tu, $yo, $number, $descripcion, $rol);
                    //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                }
            } else {
                $alert = 'No Se Adjunto Archivo';
                $insert = $this->model->agregar_validar_comentarios($tu, $yo, $number, $descripcion, $rol);
                //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
            }
            header("location: " . base_url() . "Contratos/Foro?msg=$alert");
            die();
        }
    }
?>