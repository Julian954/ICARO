<?php
class Despachos extends Controllers //Aquí se debe llamas igual que el archivo
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
    public function Registro()
    {
        //$id = $_GET['id'];
        $data1= $this->model->SelectUnidad();
        //$data2 = $this->model->SelectFecha();
    $this->views->getView($this, "Registro", "", $data1);
    }

    public function agregar() {
        if (isset($_POST['negadas'])) {
            $negadas = 1;
        } else {
            $negadas = 0;
        }
        $unidad = limpiarInput($_POST['unidad']);
        $remision = limpiarInput($_POST['remision']);
        $entrega = limpiarInput($_POST['entrega']);
        //$administrador = limpiarInput($_SESSION['id']);
        $hora = limpiarInput($_POST['hora']);
        $archivo = limpiarInput($_POST['archivo']);          
        $fecha_termina = date("Y-m-d", strtotime("+2 month"));
        
        $insert = $this->model->agregarDespacho($unidad, $negadas, $remision, $entrega, $hora, $archivo, $fecha_termina);
        if ($insert == 'existe') {
            $alert = 'existe';
            header("location: " . base_url() . "Despachos/Registro?msg=$alert");
        } else if ($insert > 0) {
            //Si se agrega te redirige a la vista "General" con un mensaje de alerta.
            $alert = 'registrado';
            header("location: " . base_url() . "Despachos/Regitro?msg=$alert");
        } else {
            $alert = 'error';
            header("location: " . base_url() . "Despachos/Registro?msg=$alert");
        }
        die();
    }
}
?>