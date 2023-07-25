<?php
class Excel extends Controllers //Aquí se debe llamas igual que el archivo
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
    public function Subir()
    {
        $data1 = $this->model->fechain();
        $data2 = $this->model->fechane();
        $data3 = $this->model->fechana();
        $data4 = $this->model->fechap();
        $this->views->getView($this, "Subir", "", $data1, $data2, $data3, $data4);        
        die();
    }
}         
?>

