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
    
    //Muestra la vista HOME
    public function Home()
    {
        $data1 = $this->model->nivelatencionycosto();
        $data2 = $this->model->negadasymanuales();
        $data3 = $this->model->top15negadas();
        $data4 = $this->model->quejas();
        $this->views->getView($this, "Home", "", $data1, $data2, $data3, $data4);
        die();
    }

    //Datos para la gráfica de clinicas
    public function BarrasAtencion()
    {
        // Si hoy es lunes, nos daría el lunes pasado.
        if (date("D")=="Mon"){
            $week_start = date("Y-m-d", strtotime('last Monday', time()));
            $week_end = date("Y-m-d",strtotime($week_start.'+ 6 days', time()));
        } else {
            $week_start = date("Y-m-d", strtotime('last Monday', time()));
            $week_end = date("Y-m-d",strtotime('next Sunday', time()));
        }
        $data = [];
        for ($i=0; $i < 5; $i++) { 
            //AQUI TENGO QUE HACER DOS CONSULTAS EN LAS PIDO LA MEDIA NACIONAL DE UN DIA DADO
            //DESPUÉS LO AGREGO A UN OBJETO
            $week_start = date("Y-m-d",strtotime($week_start.'+ 1 days', time()));
        }
        die();
        $data = $this->model->Gpastelnegadas();
        echo json_encode($data);
        die();
    }

    //Datos para la gráfica de clinicas
    public function pastelnegadas()
    {
        $data = $this->model->Gpastelnegadas();
        echo json_encode($data);
        die();
    }
    
    public function Queja(){
        $id = $_POST['id'];
        $descipcion  =$_POST['descipcion'];
        $piezas=$_POST['piezas'];
        $umf  =$_POST['umf'];
        $receta=$_POST['receta'];
        $estado  =$_POST['estado'];
        //$fecha=$_POST['fecha'];
        $insert = $this->model->insertarQueja($descipcion, $piezas, $umf, $receta, $estado, $id);
        header("location: " . base_url() . "Inicio/Home");
        die();
    }


    public function Notificaciones()
    {
        $this->views->getView($this, "Notificaciones", "");
        die();
    }

    //Vista Configuración
    public function Configuracion()
    {
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();

        $this->views->getView($this, "Configuracion", "", $data1, $data2, $data3, $data4);
        die();
    }

    //Agregar Area
    public function AgregarArea()
    {
        $Area = $_POST['area'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarArea($Area, $Usuario);
        $alert =  'AreaAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Area
    public function EliminarArea()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarArea($id);
        $alert =  'AreaElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Agregar Tipo
    public function AgregarTipo()
    {
        $Tipo = $_POST['tipo'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarTipo($Tipo, $Usuario);
        $alert =  'TipoAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Tipo
    public function EliminarTipo()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarTipo($id);
        $alert =  'TipoElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Agregar Plataforma
    public function AgregarPlataforma()
    {
        $Plataforma = $_POST['plataforma'];
        $Usuario = $_SESSION['id'];
        $Agregar = $this->model->agregarPlataforma($Plataforma, $Usuario);
        $alert =  'PlataformaAgre';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Plataforma
    public function EliminarPlataforma()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarPlataforma($id);
        $alert =  'PlataformaElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }
   
        //Agregar Plataforma
        public function AgregarTipoContratacion()
        {
            $TipoContrata = $_POST['tipocontrata'];
            $Usuario = $_SESSION['id'];
            $Agregar = $this->model->agregarTipoContratacion($TipoContrata, $Usuario);
            $alert =  'TipoContratacionAgregada';
            $data1 = $this->model->SelectAreas();
            $data2 = $this->model->SelectTipo();
            $data3 = $this->model->SelectPlataforma();
            $data4 = $this->model->SelectTipoContratacion();
            header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
            die();
        }
    
        //Eliminar Plataforma
        public function EliminarTipoContratacion()
        {
            $id = $_GET['id'];
            $eliminar = $this->model->eliminarTipoContratacion($id);
            $alert =  'TipoContratacionEliminada';
            $data1 = $this->model->SelectAreas();
            $data2 = $this->model->SelectTipo();
            $data3 = $this->model->SelectPlataforma();
            $data4 = $this->model->SelectTipoContratacion();
            header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
            die();
        }

        public function subir_rank()
        {
        $satisfaccion = $_POST['satisf'];
        $rank = $_POST['rank'];
        $fecha = $_POST['fecha'];          
        $insert = $this->model->insertarrank($satisfaccion, $rank, $fecha);        
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();   
        }

    public function subir_archivo() {
        // Verificar si se ha enviado un archivo
        $fecha = limpiarInput($_POST['fechas']);
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
          $data = $this->model->ordenarnegad($fecha);
          $i = 0;
          foreach ($data as $neg) {
            if ($i>14) {
                $eliminar = $this->model->eliminarorden($neg['id']);
            }
            $i++;
          } 

          $alert =  'DocumentoActualizado';
        }
        
        // Redirigir a la página deseada después de la carga del archivo
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();
      }
      
    
}                       
?>

