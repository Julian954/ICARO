<?php
class Pedidos extends Controllers //Aquí se debe llamas igual que el archivo
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
    public function Compras()
    {
        $this->views->getView($this, "Compras", "");
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
        header("location: " . base_url() . "Pedidos/Unidades?msg=$alert");
        die();
    }

    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $abreviacion = $_POST['abreviacion'];          
        $insert = $this->model->insertarUnidades($nombre, $clave, $abreviacion);        
        header("location: " . base_url() . "Pedidos/Unidades?msg=$alert");
        die();   
    }

    public function eliminarper()
    {
        $id = $_GET['id'];
        
        $eliminar = $this->model->eliminarUnidades($id);
        //$data = $this->model->selectUsuarios();
        $alert =  'eliminado';
        $data1 = $this->model->selectUnidades(); 
        header("location: " . base_url() . "Pedidos/Unidades?msg=$alert");
        die();
    }
    //hasta aqui son las unidades
    
    public function subir_archivo() {
        // Verificar si se ha enviado un archivo
        $fecha = limpiarInput($_POST['fechaId']);
        if (!empty($_FILES['archivo']['name'])) {
          $archivo_tmp = $_FILES['archivo']['tmp_name'];
          
          // Procesar el archivo CSV y obtener los datos
          $datos = [];
          if (($gestor = fopen($archivo_tmp, 'r')) !== false) {
            while (($fila = fgetcsv($gestor, 1000, ',')) !== false) {
              $datos[] = $fila;
            }
            fclose($gestor);
          }
      
          // Pasar los datos al modelo para su inserción en la base de datos
          $this->model->insertar_datos($datos,$fecha);
          $alert =  'DocumentoActualizado';
        }
        
        // Redirigir a la página deseada después de la carga del archivo
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();
      }
}
?>