<?php
class Contratos extends Controllers //Aquí se debe llamas igual que el archivo
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //llamado de las vistas
    public function Contratos_seguimiento()
    {
        $data1 =$this->model->selectContrato();
        $data2 =$this->model->porcentajesCont();
        $this->views->getView($this, "Contratos_seguimiento", "",$data1, $data2);
    }

    public function Contratos_Revision()
    {        
        $data10 =$this->model->validar_cont();
        $data1 =$this->model->selectContrato();
        $this->views->getView($this, "Contratos_Revision", "",$data10,$data1);
    }

    public function Contratos_Registro(){
        $this->views->getView($this, "Contratos_Registro", "");
    }

    //agrega nuevo contrato
    public function agregar()
    {
        $numero = $_POST['numero'];
        $descripcion = $_POST['descripcion'];
        $area = $_POST['area'];
        $administrador = $_SESSION['nombre'];
        $tipo = $_POST['tipo'];
        $termino = $_POST['termino'];
        $maximo = $_POST['maximo'];
        $fianza = $_POST['fianza'];
        $plataforma = $_POST['plataforma'];
        $estado = 1; //POR DEFAULT SE CREAN CON 1 (En Contratacion)
        $devengo = 0; //default\
        $fecha = $_POST['fecha'];

        $insert = $this->model->agregarContrato($numero, $descripcion, $administrador, $area, $tipo, $termino, $maximo, $fianza, $estado, $plataforma, $devengo, $fecha);
        $alert='Registrado';
        header("location: " . base_url() . "Contratos/Contratos_Registro?msg=$alert");
        die();
    } 

    public function mostrar()
    {

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