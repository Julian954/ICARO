<?php
class Articulos extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de usuarios
    public function Listarart()
    {
        $data1 = $this->model->selectArticulos();
        $this->views->getView($this, "Listarart", "", $data1);
    }

    //Añade un nuevo usuario
    public function insertar()
    {
        $clave = limpiarInput($_POST['clave']);
        $descripcion = limpiarInput($_POST['desc']);
        $corta = limpiarInput($_POST['corta']);
        $insert = $this->model->insertarArticulos($clave, $descripcion, $corta);
        if ($insert == 'existe') {
            // Si el artículo ya existe, muestra una alerta
            $alert = 'El artículo ya existe';
        } elseif ($insert) {
            // Si el artículo se registra correctamente, muestra una alerta de éxito
            $alert = 'Artículo registrado exitosamente';
        } else {
            // Si ocurre un error en el registro, muestra una alerta de error
            $alert = 'Error al registrar el artículo';
        }
        // Pasa la alerta como parámetro GET en la redirección
        header("location: " . base_url() . "Articulos/Listarart?msg=" . urlencode($alert));
        die();
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarArticulo($id);
        if ($data1 == 0) {
            $this->Listarart();
        } else {
            $this->views->getView($this, "Editarart","", $data1);
        }
    }

    public function actualizar()
    {
        $id = $_POST['id'];
        $clave = limpiarInput($_POST['clave']);
        $descripcion = limpiarInput($_POST['desc']);
        $corta = limpiarInput($_POST['corta']);
        $actualizar = $this->model->actualizarArticulos($clave, $descripcion, $corta, $id);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Articulos/Listarart?msg=$alert");
        die();
    }

    public function eliminar()
    {
        $id = $_POST['user_id'];
        $eliminar = $this->model->eliminarArticulo($id);
        $alert = 'Eliminado';
        $data1 = $this->model->selectArticulos();
        header("location: " . base_url() . "Articulos/Listarart?msg=$alert");
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function procesarArchivo() {
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
            $this->model->procesarArchivos($datos);
            $alert =  'DocumentoActualizado';
        }
          
          // Redirigir a la página deseada después de la carga del archivo
          header("location: " . base_url() . "Articulos/Listarart?msg=$alert");
          die();
    }

}
?>