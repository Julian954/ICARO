<?php
class Inicio extends Controllers //Aquí se debe llamas igual que el archivo
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Aquí se debe llamar igual que la vista
    public function Home()
    {
        $this->views->getView($this, "Home", "");
        die();
    }

    public function Notificaciones()
    {
        $this->views->getView($this, "Notificaciones", "");
        die();
    }

    //Vista Configuración
    public function Configuracion()
    {
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $this->views->getView($this, "Configuracion", "", $data1, $data2, $data3);
        die();
    }

    //Agregar Area
    public function AgregarArea()
    {
        $Area = $_POST['area'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarArea($Area, $Usuario);
        $alert =  'AreaAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Area
    public function EliminarArea()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarArea($id);
        $alert =  'AreaElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Agregar Tipo
    public function AgregarTipo()
    {
        $Tipo = $_POST['tipo'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarTipo($Tipo, $Usuario);
        $alert =  'TipoAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Tipo
    public function EliminarTipo()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarTipo($id);
        $alert =  'TipoElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Agregar Plataforma
    public function AgregarPlataforma()
    {
        $Plataforma = $_POST['plataforma'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarPlataforma($Plataforma, $Usuario);
        $alert =  'PlataformaAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Plataforma
    public function EliminarPlataforma()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarPlataforma($id);
        $alert =  'PlataformaElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }
}
?>