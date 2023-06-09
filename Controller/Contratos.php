<?php
    class Contratos extends Controllers {

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
            $this->views->getView($this, "Registro", "", $data1, $data2, $data3);
        }

        // Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
        public function agregar() {
            $numero = limpiarInput($_POST['numero']);
            $descripcion = limpiarInput($_POST['descripcion']);
            $area = limpiarInput($_POST['area']);
            $administrador = limpiarInput($_SESSION['id']);
            $tipo = limpiarInput($_POST['tipo']);
            $termino = limpiarInput($_POST['termino']);
            $maximo = limpiarInput($_POST['maximo']);
            $fianza = limpiarInput($_POST['fianza']);
            $plataforma = limpiarInput($_POST['plataforma']);
            $devengo = 0; // default

            $insert = $this->model->agregarContrato($numero, $descripcion, $area, $administrador, $tipo, $termino, $maximo, $fianza, $plataforma, $devengo);
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
                            $nombre_nuevo = $oficio . "0" . $administrador . $i . $tipo . "." . $name["extension"];
                            $ruta_destino = 'Assets/Documentos/Peticiones/' . $nombre_nuevo;
                            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                                $i = $i + 1;
                                $documento = $i;
                                $agregar = $this->model->agregar_pdf($oficio, $nombre_nuevo, 0, $tipo);
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
            $data1 =$this->model->selectContrato($contrato);
            $data2 =$this->model->datos_foro($contrato);
            $data3 =$this->model->archivos_foro($contrato);
            $this->views->getView($this, "Foro", "", $data1, $data2, $data3);
        }



        public function validar(){
            $number = limpiarInput($_GET['contrato']);
            $estado = 3;
            $actualizar = $this->model->actualizaEstado($estado, $number);
            $alert = "validado";
            header("location: " . base_url() . "Contratos/Validando?msg=$alert");
            die();
        }

        public function formalizar(){
            $number = limpiarInput($_GET['contrato']);
            $estado = 4;
            $actualizar = $this->model->actualizaEstado($estado, $number);
            $actualizar2 = $this->model->actualizaEstado4($estado, $number);
            $alert = "Formalizado";
            header("location: " . base_url() . "Contratos/Validando?msg=$alert");
            die();
        }

        public function agregar_comentario(string $contrato)
        {
            $descripcion = $_POST['descripcion'];        
            $yo = $_SESSION['id'];   
            $number =$_POST['number'];
            $intento = $this->model->contarintento($number);
            $insert = $this->model->agregar_validar_comentarios($yo, $number, $descripcion, $intento['intentos']+1);
            $contrato = $this->model->selectContrato($number);
            if ($contrato['id_creador'] == $yo) {
                $sumar = $this->model->actualizarintento($contrato['intentos']+2, $number);
            }

            $i = 0;
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
                        $nombre_nuevo = $number."0".$yo.$i.".".$name["extension"];                                
                        $ruta_destino = 'Assets/Documentos/Foro/'.$nombre_nuevo;
                        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                            $i=$i+1;
                            $alert=$i;            
                            $agregar= $this->model->agregar_pdf($number, $nombre_nuevo, $intento['intentos']+1, 1);
                        } else {
                            $alert =  'No Se Adjunto Archivo';
                        }
                    } else {
                    $alert =  'No Se Adjunto Archivo';

                    }
                } else {
                    $alert =  'No Se Adjunto Archivo';
                }
            }                        
            header("location: " . base_url() . "Contratos/Foro?contrato=$number&=msg=$alert");
            die();
        }
    }
?>

