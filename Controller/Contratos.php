<?php

class Contratos extends Controllers {

    /**
     * Inicia la sesión y verifica si el usuario está activo.
     * Si el usuario no está activo, redirige al inicio de sesión.
     * Llama al constructor de la clase padre (Controllers).
     */
    public function __construct() {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    // Muestra la vista "Contratos_seguimiento" con los datos obtenidos de los modelos.
    public function General() {
        $data1 = $this->model->selectContratos();
        $data2 = $this->model->porcentajesCont();
        $data3 = $this->model->totalcontratos();
        $data4 = $this->model->tipocontrato();
        $data5 = $this->model->tipoplatformaconv();
        $data7 = $this->model->PgsBarContr();

        $this->views->getView($this, "General", "", $data1, $data2, $data3, $data4, $data5, "", $data7);
    }

    public function Validando()
    {        
        $data1 =$this->model->selectContratosVal();
        $data2 =$this->model->selectExternoJ();
        $data3 =$this->model->selectContratosEdo1();
        $this->views->getView($this, "Validando", "",$data1, $data2, $data3);
    }

    public function Foro()
    {
        $contrato = $_GET['contrato'];       
        $data1 =$this->model->selectContrato($contrato);
        $data2 =$this->model->datos_foro($contrato);
        $this->views->getView($this, "Foro", "", $data1,$data2);
    }

    /**
     * Muestra la vista "Registro".         
     */
    public function Registro() {
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $this->views->getView($this, "Registro", "", $data1, $data2, $data3);
    }

    /**
     * Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
     * Redirige a la vista "Contratos_Registro" con un mensaje de alerta.
     */
    public function agregar() {
        $numero = $_POST['numero'];
        $descripcion = $_POST['descripcion'];
        $area = $_POST['area'];
        $administrador = $_SESSION['id'];
        $tipo = $_POST['tipo'];
        $termino = $_POST['termino'];
        $maximo = $_POST['maximo'];
        $fianza = $_POST['fianza'];
        $plataforma = $_POST['plataforma'];
        $devengo = 0; // default

        $insert = $this->model->agregarContrato($numero, $descripcion, $area, $administrador, $tipo, $termino, $maximo, $fianza, $plataforma, $devengo);
        $alert = 'Registrado';
        header("location: " . base_url() . "Contratos/Registro?msg=$alert");
        die();
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
        $yo = $_SESSION['id'];
        $number =$_POST['miSelect2'];
        //$nombre_archi=$_POST['archivo'];   
        //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $number.".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/Peticiones/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                    $alert='Registrado';            
                    $agregar= $this->model->agregar_pdf($number, $descripcion, $yo, $tu, $nombre_nuevo);

                } else {
                    $alert =  'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
                }
            } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar( $number, $descripcion, $yo, $tu);
            }
        } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
        }
        $estado = 2;
        $actualizar = $this->model->actualizaEstado($estado, $number);                        
        header("location: " . base_url() . "Contratos/Validando?msg=$alert");
        die();
    }
//descargar el pdf del historial en la conversacion del Foro
    public function get_pdf(){
     
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
        $tu = 2;
        $number =$_POST['number'];
        //$me=$_POST['yo'];
        //$numero = $_POST['miSelect2'];
        $descripcion = $_POST['descripcion'];        
        $yo = $_SESSION['id'];   
        $rol=$_SESSION['rol'];
        //$nombre_archi=$_POST['archivo'];   
        //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $_SESSION['id'].".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/Foro/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                    $alert='Registrado';            
                    $agregar= $this->model->agregar_comentarios_pdf($tu,$yo,$number, $descripcion, $nombre_archivo,$rol);
                    //ingreso los datos de contraro, interno y externo para referenciar en el foro
                    //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                } else {
                    $alert =  'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar_comentarios($tu,$yo,$number, $descripcion,$rol);
                    //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                }
            } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar_comentarios( $tu,$yo,$number, $descripcion,$rol);
            //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
            }
        } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar_comentarios($tu,$yo,$number, $descripcion,$rol);
            //$agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
        }                        
        header("location: " . base_url() . "Contratos/Foro?contrato=$number&=msg=$alert");
        die();
    }
}
?>
