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
        $data1 = $this->model->nivelatencionycosto();
        $data2 = $this->model->negadasymanuales();
        $data3 = $this->model->top15negadas();
        $data4 = $this->model->quejas();
        $data5 = $this->model->pedidos();
        $this->views->getView($this, "Indicador", "", $data1, $data2, $data3, $data4, $data5);
    }

    //Datos para la gráfica de clinicas
    public function barrasrankig()
    {
        $data = $this->model->ranking();
        echo json_encode($data);
        die();
    }

    //POR CADA CONTROLADOR QUE SE CREE SE TIENE QUE CREAR UN MODEL
    public function insertarnacional()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $abreviacion = $_POST['abreviacion'];          
        $insert = $this->model->insertarUnidades($nombre, $clave, $abreviacion);        
        header("location: " . base_url() . "Pedidos/Unidades?msg=$alert");
        die();   
    }

    public function procesarArchivo() {

        $fechad = limpiarInput($_POST['fecha']);
        if (!empty($_FILES['archivo_csv']['name'])) {
            $archivo_tmp = $_FILES['archivo_csv']['tmp_name'];
            
            // Procesar el archivo CSV y obtener los datos
            $datos = [];
            if (($gestor = fopen($archivo_tmp, 'r')) !== false) {
              while (($fila = fgetcsv($gestor, 1000, ',')) !== false) {
                $datos[] = $fila;
              }
              fclose($gestor);
            }

            // Pasar los datos al modelo para su inserción en la base de datos
            $this->model->procesarArchivos($datos, $fechad);
            $alert =  'Documento Subido';
        } 
          // Redirigir a la página deseada después de la carga del archivo
          header("location: " . base_url() . "Excel/Subir?msg=$alert");
          die();
    }
}
?>