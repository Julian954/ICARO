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
                $cantidad_agregada = ($cantidad_total - 11);
                if ($i > 1) {
                    $datos = explode(",", $linea);
                    $nopedido = $datos[4]??'';//E
                    $tipo = $datos[7]??'';//H
                    $gen = $datos[8]??'';//i
                    $clave = $datos[9]??'';//J
                    $dif= $datos[10]??'';//K
                    $var= $datos[11]??'';//L
                    $topn = $tipo . $gen . $clave . $dif . $var; //H-L
                    $cantidad = $datos[25]??'';//Z
                    $proveedor = $datos[28]??'';//AC
                    $noalta = $datos[34]??'';//AI
                    $fecha_alta = $datos[33] ?? ''; //AH
                    $monto = $datos[42] ?? '';//AQ
                    $pagado = $datos[44] ?? '';//AS
                    if ($nopedido != "" && $tipo != "" ){
                        $insert = $this->model->insertar_datos($codigo, $nombre, $precio, $proveedor, $categoria, $tipo, $minimo);
                        $a++;
                    } else{
                        $e++;
                    }
                }
                $i++;
            }
            $alert = "cargado";
            header("location: " . base_url() . "Productos/Listar?msg=$alert&a=$a&e=$e&x=$x");
        }else{
            $alert = "error";
            header("location: " . base_url() . "Productos/Listar?msg=$alert");
        }
        die();  
    }

}         
?>

