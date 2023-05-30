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

    /**
     * Muestra la vista "Contratos_seguimiento" con los datos obtenidos de los modelos.
     */
    public function Contratos_seguimiento() {
        $data1 = $this->model->selectContrato();
        $data2 = $this->model->porcentajesCont();
        $data3 = $this->model->totalcontratos();
        $data4 = $this->model->tipocontrato();
        $data5 = $this->model->tipoplatformaconv();
        $data6 = $this->model->datosuser();
        $data7 = $this->model->PgsBarContr();

        $this->views->getView($this, "Contratos_seguimiento", "", $data1, $data2, $data3, $data4, $data5, $data6, $data7);
    }

    public function Contratos_Revision()
    {        
        $data10 =$this->model->validar_cont();
        $data1 =$this->model->selectContrato();
        $this->views->getView($this, "Contratos_Revision", "",$data10,$data1);
    }

    /**
     * Muestra la vista "Contratos_Registro".
     */
    public function Contratos_Registro() {
        $this->views->getView($this, "Contratos_Registro", "");
    }

    /**
     * Agrega un nuevo contrato a la base de datos con los datos proporcionados mediante el formulario.
     * Redirige a la vista "Contratos_Registro" con un mensaje de alerta.
     */
    public function agregar() {
        $numero = $_POST['numero'];
        $descripcion = $_POST['descripcion'];
        $area = $_POST['area'];
        $administrador = $_SESSION['nombre'];
        $tipo = $_POST['tipo'];
        $termino = $_POST['termino'];
        $maximo = $_POST['maximo'];
        $fianza = $_POST['fianza'];
        $plataforma = $_POST['plataforma'];
        $estado = 1; // POR DEFAULT SE CREAN CON 1 (En Contratacion)
        $devengo = 0; // default
        $fecha = $_POST['fecha'];

        $insert = $this->model->agregarContrato($numero, $descripcion, $area, $administrador, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha);
        $alert = 'Registrado';
        header("location: " . base_url() . "Contratos/Contratos_Registro?msg=$alert");
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
        //$numero = $_POST['miSelect2'];
        $descripcion = $_POST['descripcion'];        
        $yo = $_SESSION['usuario'];
        $number =$_POST['miSelect2'];
        //$nombre_archi=$_POST['archivo'];
        $fecha = $_POST['fecha'];       
        //$estado = +1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK ) {
                $nombre_nuevo = $_SESSION['id'].".".$name["extension"];                                
                $ruta_destino = 'Assets/Documentos/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {                                        
                    $alert='Registrado';            
                    $agregar= $this->model->agregar_pdf($number, $descripcion, $yo, $tu, $nombre_archivo, $fecha);
                } else {
                    $alert =  'No Se Adjunto Archivo';
                    $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu, $fecha);
                }
            } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar( $number, $descripcion, $yo, $tu, $fecha);
            }
        } else {
            $alert =  'No Se Adjunto Archivo';
            $insert = $this->model->agregar_validar($number, $descripcion, $yo, $tu, $fecha);
        }                        
        header("location: " . base_url() . "Contratos/Contratos_Revision?msg=$alert");
        die();
    }

}
?>
