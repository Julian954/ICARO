<?php

class Contrataciones extends Controllers {

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
        $data1 = $this->model->totalContrataciones();
        $data2 = $this->model->tipocontratoCns();
        $data3 = $this->model->tipocontratacion();
        $this->views->getView($this, "General", "", $data1, $data2, $data3, "", "", "", "");
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
        $data2 =$this->model->datos_foro();
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
        
        $name = pathinfo($_FILES['archivo_cont']['name']);
        $nombre_archivo = $_FILES['archivo_cont']['name'];        
        $tipo_archivo = $_FILES['archivo_cont']['type'];
        $tamano_archivo = $_FILES['archivo_cont']['size'];
        $ruta_temporal = $_FILES['archivo_cont']['tmp_name'];
        $error_archivo = $_FILES['archivo_cont']['error'];
        $tmaximo = 20 * 1024 * 1024;
        $oficio = $_POST['NoOficio'];
        $administrador = $_SESSION['nombre'];
        $descripcion = $_POST['Descripcion'];
        $contratacion = $_POST['TipoCn'];
        $area = $_POST['Area'];
        $contrato = $_POST['Contrato'];
        $termino = $_POST['Termino'];
        $maximo = $_POST['Maximo'];
        $dictamen = $_POST['Dictamen'];
        $inicio = $_POST['fecha'];

        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $oficio.".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/Peticiones/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                    $alert='Registrado';            
                    $agregar= $this->model->agregarContratacion($oficio, $administrador, $descripcion, $contratacion, $area, $contrato, $termino, $maximo, $dictamen, $nombre_archivo, $inicio);

                } else {
                    $alert =  'No Se Adjunto Archivo';
                    $insert = $this->model->agregarContratacion($oficio, $administrador, $descripcion, $contratacion, $area, $contrato, $termino, $maximo, $dictamen, $nombre_archivo, $inicio);
                }
            } 
        }
        $insert = $this->model->agregarContratacion($oficio, $administrador, $descripcion, $contratacion, $area, $contrato, $termino, $maximo, $dictamen, $nombre_archivo, $inicio);
        header("location: " . base_url() . "Contrataciones/Registro?msg=$alert");
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
        $yo = $_SESSION['nombre'];
        $number =$_POST['miSelect2'];
        //$nombre_archi=$_POST['archivo'];   
        //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $_SESSION['id'].".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                    $alert='Registrado';            
                    $agregar= $this->model->agregar_pdf($number, $descripcion, $yo, $tu, $nombre_archivo);
                    //ingreso los datos de contraro, interno y externo para referenciar en el foro
                    $agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                } else {
                    $alert =  'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
                    $agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
                }
            } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar( $number, $descripcion, $yo, $tu);
            $agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
            }
        } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu);
            $agregar_foro= $this->model->agregar_foro($number, $yo, $tu);
        }                        
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
        $tu = $_POST['tu'];
        $number =$_POST['number'];
        //$me=$_POST['yo'];
        //$numero = $_POST['miSelect2'];
        $descripcion = $_POST['descripcion'];        
        $yo = $_POST['yo'];   
        $rol=$_SESSION['rol'];
        //$nombre_archi=$_POST['archivo'];   
        //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $_SESSION['id'].".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/'.$nombre_nuevo;
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
        header("location: " . base_url() . "Contratos/Foro?msg=$alert");
        die();
    }
}
?>
