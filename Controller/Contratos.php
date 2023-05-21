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

    //Aquí se debe llamar igual que la vista
    public function Contratos_seguimiento()
    {
        $this->views->getView($this, "Contratos_seguimiento", "");
    }

    public function Contratos_Revision()
    {
        $this->views->getView($this, "Contratos_Revision", "");
    }

    public function Contratos_Registro(){
        $this->views->getView($this, "Contratos_Registro", "");
    }
    //POR CADA CONTROLADOR QUE SE CREE SE TIENE QUE CREAR UN MODEL
}
?>