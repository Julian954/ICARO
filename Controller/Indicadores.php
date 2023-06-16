<?php
class Indicadores extends Controllers //Aquí se debe llamas igual que el archivo
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
    public function Indicador()
    {
        $this->views->getView($this, "Indicador", "");
    }

    //Aquí se debe llamar igual que la vista
    public function Estadisticas()
    {
        $data1 = $this->model->nivelatencionycosto();
        $data2 = $this->model->negadasymanuales();
        $this->views->getView($this, "Estadisticas", "", $data1, $data2);
    }

}
?>