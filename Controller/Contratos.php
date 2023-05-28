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

    /**
     * Muestra la vista "Contratos_Revision".
     */
    public function Contratos_Revision() {
        $this->views->getView($this, "Contratos_Revision", "");
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

}
?>
