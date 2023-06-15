<?php
class Unidades extends Controllers //Aquí se debe llamas igual que el archivo
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    public function Unidad()
    {
        $data1 = $this->model->SelectUnidades();
        $this->views->getView($this, "Unidad", "", $data1);
    }

    //De aqui para abajo es la de unidades
    public function Unidades()
    {
        $data1 = $this->model->selectUnidades();
        $this->views->getView($this, "Unidades", "",$data1);
    }
    public function Unidades_Editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarUnidades($id);
        if ($data1 == 0) {
            $this->Unidades();
        } else {
            $this->views->getView($this, "Unidades_Editar","", $data1);
        }
    }
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];        
        $abreviacion = $_POST['abreviacion'];        
        $actualizar = $this->model->actualizarUnidades($nombre, $clave, $abreviacion, $id);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Unidades/Unidad?msg=$alert");
        die();
    }

    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $abreviacion = $_POST['abreviacion'];          
        $insert = $this->model->insertarUnidades($nombre, $clave, $abreviacion);        
        header("location: " . base_url() . "Unidades/Unidad?msg=$alert");
        die();   
    }

    public function eliminarper()
    {
        $id = $_GET['id'];
        
        $eliminar = $this->model->eliminarUnidades($id);
        //$data = $this->model->selectUsuarios();
        $alert =  'eliminado';
        $data1 = $this->model->selectUnidades(); 
        header("location: " . base_url() . "Unidades/Unidad?msg=$alert");
        die();
    }
    //hasta aqui son las unidades
    
    //POR CADA CONTROLADOR QUE SE CREE SE TIENE QUE CREAR UN MODEL
}
?>