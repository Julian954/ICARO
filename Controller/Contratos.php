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
        $this->views->getView($this, "Contratos_Revision", "");
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
}
?>