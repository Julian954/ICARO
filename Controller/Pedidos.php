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
        //$id = $_GET['id'];
        $data1= $this->model->SelectPedido();
        $data2 = $this->model->SelectFecha();
    $this->views->getView($this, "Compras", "", $data1, $data2);
    }

    public function Pagado(){
        $id = $_POST['id'];
        $monto2=$_POST['monto2'];
        $insert = $this->model->insertarPago($monto2, $id);
        header("location: " . base_url() . "Pedidos/Compras");
        die();
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
        $fecha = limpiarInput($_POST['fechaId'] );
        if (!empty($_FILES['archivo']['name']) && $data2[0]!=$fecha) {
          $archivo_tmp = $_FILES['archivo']['tmp_name'];
          $this->model->eliminar_datos_viejos();
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
        elseif (empty($_FILES['archivo']['name'])){
            $this->model->eliminar_datos($fecha);
          $alert =  'DocumentoEliminado';
        }
        else{
            $alert =  'Error_Contacta_Al_Administrador';
        }
        // Redirigir a la página deseada después de la carga del archivo
        header("location: " . base_url() . "Excel/Subir?msg=$alert");
        die();
      }

    public function subirarchivo()
    {
        $fecha = limpiarInput($_POST['fechaId']);
        $name = pathinfo($_FILES["archivo"]["name"]);
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "csv")){
            $gestor = fopen($ruta_temporal, 'r');
            while (($fila = fgetcsv($gestor, 1000, ',')) !== false) {
                $fila2 = array_slice($fila, 0, 46);
                $data[] = $fila2;
            }
            $a = 0; //Agregados
            $e = 0; //Error
            $x = 0; //Ya existen
            array_splice($data, 0, 11);
            foreach ($data as $datos) {
                $nopedido = $datos[4]??'';//E
                $tipo = $datos[7]??'';//H
                $gen = $datos[8]??'';//i
                $clave = $datos[9]??'';//J
                $dif= $datos[10]??'';//K
                $var= $datos[11]??'';//L
                $topn = $tipo . $gen . $clave . $dif . $var; //H-L
                $cantidad = $datos[25]??'';//Z
                $proveedor = $datos[28]??'';//AC
                $fecha_inicio = $datos[30]??'';//AE
                $noalta = $datos[34]??'';//AI
                $eta = $datos[31] ?? ''; //AH
                $fecha_alta = $datos[33] ?? ''; //AH
                $monto = $datos[42] ?? '';//AQ
                $pagado = $datos[44] ?? '';//AS 
                if ($nopedido != "" && $tipo != "" && $gen != "" && $clave != "" && $dif != "" && $var != "" && $cantidad != "" && $proveedor != "" && $monto != "" && $pagado != "" && $eta != ""){
                    $insert = $this->model->subir_datos($nopedido, $tipo, $clave, $noalta, $proveedor, $fecha_inicio, $cantidad, $topn, $eta, $fecha_alta, $monto, $pagado, $fecha);
                    $a++;
                } else{
                    $e++;
                }
            }
            $alert = "cargado";
            header("location: " . base_url() . "Excel/Subir?msg=$alert&a=$a&e=$e&x=$x");
        }else{
            $alert = "error";
            header("location: " . base_url() . "Excel/Subir?msg=$alert");
        }
        die();  
    }
}
?>