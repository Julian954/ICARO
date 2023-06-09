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
        $this->views->getView($this, "Subir", "");
        die();
    }
    

             
    public function subirarchivo()
    {
        $name = pathinfo($_FILES["archivo"]["name"]);
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "csv")){
            $lineas = file($ruta_temporal);
            $i = 0;
            $a = 0; //Agregados
            $e = 0; //Error
            $x = 0; //Ya existen
            foreach (($lineas) as $linea) {
                $cantidad_total = count($lineas);
                $cantidad_agregada = ($cantidad_total - 2);
                if ($i > 1) {
                    $datos = explode(",", $linea);
                    $codigo = $datos[0];
                    $nombre = $datos[1];
                    $precio = $datos[2];
                    $minimo = $datos[3]; 
                    $categoria = $datos[4];
                    $proveedor = $datos[5];
                    $tipo = $datos[6];
                    if ($nombre != "" && $codigo != "" ){
                        $insert = $this->model->insertarProductos($codigo, $nombre, $precio, $proveedor, $categoria, $tipo, $minimo);
                        if ($insert == 'existe') {
                            $data1 = $this->model->editarProductosC($codigo);
                            if ($data1['estado'] == 2) {
                                $id = $data1['id'];
                                $actualizar = $this->model->actualizarProductos($codigo, $nombre, $cantidad, $precio, $proveedor, $categoria, $tipo, $minimo, $id);
                                $eliminar = $this->model->reingresarProductos($id);
                                    if ($actualizar == 1) {
                                        $a++;
                                    } else {
                                        $e++;
                                    }
                            } else {
                                $x++; 
                            }
                        } else if ($insert > 0) {
                            $a++;
                        } else {
                            $e++;
                        }
                    } else{
                        $e++;
                    }
                }
                $i++;
            }
            $alert = "cargado";
            $data1 = $this->model->selectProductos();
            $data2 = $this->model->selectCat();
            $data3 = $this->model->selectPro();
            header("location: " . base_url() . "Productos/Listar?msg=$alert&a=$a&e=$e&x=$x");
        }else{
            $alert = "error";
            $data1 = $this->model->selectProductos();
            $data2 = $this->model->selectCat();
            $data3 = $this->model->selectPro(); 
            header("location: " . base_url() . "Productos/Listar?msg=$alert");
        }
        die();  
    }

}         
?>

