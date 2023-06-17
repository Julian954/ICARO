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