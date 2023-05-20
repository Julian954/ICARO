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
    }

    //POR CADA CONTROLADOR QUE SE CREE SE TIENE QUE CREAR UN MODEL
}
?>