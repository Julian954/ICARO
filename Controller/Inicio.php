<?php

class Inicio extends Controllers 
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
        $hoy = date('Y-m-d');
        $data1 = $this->model->nivelatencionycosto();
        $data2 = $this->model->negadasymanuales();
        $data3 = $this->model->top15negadas();
        $data4 = $this->model->quejas();
        $data5 = $this->model->pedidos();
        $data6 = $this->model->unidades();
        $data7 = $this->model->despachos($hoy);
        $data8 = $this->model->pedidosfecha($hoy);
    $this->views->getView($this, "Home", "", $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8);
        die();
    }

    //Datos para la gráfica de clinicas
    public function BarrasAtencion()
    {
        $data = [];
    
        // Obtener la fecha de hoy
        $today = date("Y-m-d");
        $today = date("Y-m-d", strtotime($today . " -1 day"));
    
        // Contador para controlar los últimos 5 días hábiles
        $daysCount = 0;
    
        while ($daysCount < 5) {
            // Obtener el día de la semana de la fecha actual
            $dayOfWeek = date("N", strtotime($today));
    
            // Si el día de la semana es de lunes a viernes (1 a 5), excluyendo sábados (6) y domingos (7)
            if ($dayOfWeek <= 5) {
                $colima = $this->model->atencioncolima($today);
                $nacional = $this->model->atencionnacional($today);
    
                // Construir el arreglo de datos
                $array = [
                    "mnacional" => isset($nacional['mnacional']) ? $nacional['mnacional'] : "0",
                    "colima" => isset($colima['colima']) ? $colima['colima'] : "0"
                ];
    
                // Agregar el arreglo al arreglo de datos principal
                $data[] = $array;
    
                // Incrementar el contador
                $daysCount++;
            }
    
            // Restar un día a la fecha actual
            $today = date("Y-m-d", strtotime($today . " -1 day"));
        }
    
        // Invertir el arreglo de datos para que quede en orden ascendente
        $data = array_reverse($data);
    
        // Devolver los datos como JSON
        echo json_encode($data);
        die();
    }
    

    public function DescargarAtencion(){
        $data = $this->model->rankingdiario();

        // Nombre del archivo CSV y ruta de destino
        $archivo_csv = 'Assets/Documentos/Exportaciones/Atencion.csv';

        // Abrir el archivo CSV en modo escritura
        $archivo = fopen($archivo_csv, 'w');

        // Verificar si se pudo abrir el archivo
        if ($archivo) {
            // Escribir los encabezados de las columnas
            $encabezados = array('Colima', 'Nacional', 'Dia');
            fputcsv($archivo, $encabezados);
        
            foreach ($data as $campos) {
                fputcsv($archivo, $campos);
            }
            // Cerrar el archivo
            fclose($archivo);
        
            echo "Exportación completada. Se ha creado el archivo CSV.";
        } else {
            echo "Error al crear el archivo CSV.";
        }
        header("location: " . base_url() . 'Assets/Documentos/Exportaciones/Atencion.csv');
        die();
    }

    //Datos para la gráfica de clinicas
    public function pastelnegadas()
    {
        $data = $this->model->Gpastelnegadas();
        echo json_encode($data);
        die();
    }

    public function DescargarNegadas(){
        $data = $this->model->negadas();

        // Nombre del archivo CSV y ruta de destino
        $archivo_csv = 'Assets/Documentos/Exportaciones/Negadas.csv';

        // Abrir el archivo CSV en modo escritura
        $archivo = fopen($archivo_csv, 'w');

        // Verificar si se pudo abrir el archivo
        if ($archivo) {
            // Escribir los encabezados de las columnas
            $encabezados = array('Unidad', 'Negadas', 'Fecha');
            fputcsv($archivo, $encabezados);

            foreach ($data as $campos) {
                fputcsv($archivo, $campos);
            }
            // Cerrar el archivo
            fclose($archivo);
        
            echo "Exportación completada. Se ha creado el archivo CSV.";
        } else {
            echo "Error al crear el archivo CSV.";
        }
        header("location: " . base_url() . 'Assets/Documentos/Exportaciones/Negadas.csv');
        die();
    }

    public function Queja(){
        $descipcion  = limpiarinput($_POST['descripcion']);
        $piezas = limpiarInput($_POST['piezas']);
        $umf  = limpiarInput($_POST['umf']);
        $receta= limpiarInput($_POST['receta']);
        $insert = $this->model->insertarQueja($descipcion, $piezas, $umf, $receta);
        $alert = 'registrado';
        header("location: " . base_url() . "Inicio/Home?msg=$alert");
        die();
    }

    public function quejaestado(){
        $id=$_GET['id'];
        $estado= 1;
        $actualiza = $this->model->Actualizar_Queja($id, $estado);
        $alert = 'atendido';
        header("location: " . base_url() . "Inicio/Home?msg=$alert");
        die();
    }

    public function DescargarContratos(){
        $data = $this->model->contratos();

        // Nombre del archivo CSV y ruta de destino
        $archivo_csv = 'Assets/Documentos/Exportaciones/Contratos.csv';

        // Abrir el archivo CSV en modo escritura
        $archivo = fopen($archivo_csv, 'w');

        // Verificar si se pudo abrir el archivo
        if ($archivo) {
            // Escribir los encabezados de las columnas
            $encabezados = array('No Contrato', 'Descripcion', 'Area', 'Categoria', 'Tipo', 'Termino', 'Maximo', 'Fianza', 'Plataforma', 'Fecha');
            fputcsv($archivo, $encabezados);

            foreach ($data as $campos) {
                fputcsv($archivo, $campos);
            }
            // Cerrar el archivo
            fclose($archivo);
        
            echo "Exportación completada. Se ha creado el archivo CSV.";
        } else {
            echo "Error al crear el archivo CSV.";
        }
        header("location: " . base_url() . 'Assets/Documentos/Exportaciones/Contratos.csv');
        die();
    }

    public function DescargarRequerimientos(){
        $data = $this->model->requerimeintos();

        // Nombre del archivo CSV y ruta de destino
        $archivo_csv = 'Assets/Documentos/Exportaciones/Requerimeintos.csv';

        // Abrir el archivo CSV en modo escritura
        $archivo = fopen($archivo_csv, 'w');

        // Verificar si se pudo abrir el archivo
        if ($archivo) {
            // Escribir los encabezados de las columnas
            $encabezados = array('No Oficio', 'Descripcion', 'Area', 'Categoria', 'Dictamen', 'Termino', 'Maximo', 'Contrato', 'Contratacion', 'Fecha');
            fputcsv($archivo, $encabezados);

            foreach ($data as $campos) {
                fputcsv($archivo, $campos);
            }
            // Cerrar el archivo
            fclose($archivo);
        
            echo "Exportación completada. Se ha creado el archivo CSV.";
        } else {
            echo "Error al crear el archivo CSV.";
        }
        header("location: " . base_url() . 'Assets/Documentos/Exportaciones/Requerimeintos.csv');
        die();
    }

    public function DescargarPedidos(){
        $data = $this->model->pedidosd();

        // Nombre del archivo CSV y ruta de destino
        $archivo_csv = 'Assets/Documentos/Exportaciones/Pedidos.csv';

        // Abrir el archivo CSV en modo escritura
        $archivo = fopen($archivo_csv, 'w');

        // Verificar si se pudo abrir el archivo
        if ($archivo) {
            // Escribir los encabezados de las columnas
            $encabezados = array('No pedido', 'Tipo', 'Clave', 'No Alta', 'Proveedor', 'Inicio', 'Cantidad', 'ETA', 'Alta', 'Monto', 'Pagado');
            fputcsv($archivo, $encabezados);

            foreach ($data as $campos) {
                fputcsv($archivo, $campos);
            }
            // Cerrar el archivo
            fclose($archivo);
        
            echo "Exportación completada. Se ha creado el archivo CSV.";
        } else {
            echo "Error al crear el archivo CSV.";
        }
        header("location: " . base_url() . 'Assets/Documentos/Exportaciones/Pedidos.csv');
        die();
    }


    public function Notificaciones()
    {
    $data1 = $this->model->notifica();
    $this->views->getView($this, "Notificaciones", "", $data1);
    die();
    }

    public function Visto()
    {
    $id = $_GET['id'];
    $estado = 0;
    $this->model->elimnoti($estado, $id);
    header("location: " . base_url() . "Inicio/Notificaciones");
    die();
    }

    //Vista Configuración
    public function Configuracion()
    {
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        $data5 = $this->model->selectDictamen();
        $data6 = $this->model->selectColores();

        $this->views->getView($this, "Configuracion", "", $data1, $data2, $data3, $data4, $data5,$data6);
        die();
    }

    public function insertar()
    {
        $dictamen = limpiarInput($_POST['dictamen']);
        $monto = limpiarInput($_POST['monto']);
        $insert = $this->model->insertarDictamen($dictamen, $monto);
        if ($insert == 'existe') {
            // Si el artículo ya existe, muestra una alerta
            $alert = 'existe';
        } elseif ($insert) {
            // Si el artículo se registra correctamente, muestra una alerta de éxito
            $alert = 'registrado';
        } else {
            // Si ocurre un error en el registro, muestra una alerta de error
            $alert = 'error';
        }
        // Pasa la alerta como parámetro GET en la redirección
        header("location: " . base_url() . "Inicio/Configuracion?msg=" . urlencode($alert));
        die();
    }



    public function eliminardictamen()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarDictamen($id);
        $alert =  'DictamenElim';
        $data1 = $this->model->SelectAreas();
        $data2 = $this->model->SelectTipo();
        $data3 = $this->model->SelectPlataforma();
        $data4 = $this->model->SelectTipoContratacion();
        $data5 = $this->model->selectDictamen();
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
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
          header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
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
        $fecha = $_POST['fecha1'];          
        $insert = $this->model->insertarrank($satisfaccion, $rank, $fecha);        
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();   
        }
        public function elimina_rank()
        {
        $fecha = $_POST['fecha2'];          
        $insert = $this->model->eliminarank($fecha);        
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();   
        }
        public function elimina_archivo()
        {
        $fecha = $_POST['fecha2'];          
        $insert = $this->model->eliminarchivo($fecha);        
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
        elseif(empty($_FILES['archivo']['name'])){
            $this->model->eliminar_datos($fecha);
            $alert =  'DocumentoEliminado';
        }
        // Redirigir a la página deseada después de la carga del archivo
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();
      }
      
      public function AgregarColor()
    {
        $Color = $_POST['Color'];
        $insertar = $this->model->AgregarColor($Color);
        $alert =  'ColorAgre';
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    //Eliminar Area
    public function EliminarColor()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->EliminarColor($id);
        $alert =  'ColorElim';
        header("location: " . base_url() . "Inicio/Configuracion?msg=$alert");
        die();
    }

    public function pastelcolores()
    {
        $data = $this->model->selectColores();
        echo json_encode($data);
        die();
    }
        
}                       
?>

