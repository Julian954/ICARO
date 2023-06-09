<?php

class ArticulosModel extends Mysql
{

    public $id, $clave, $descripcion, $descorta;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona usuarios activos
    public function selectArticulos()
    {
        $sql = "SELECT * FROM catalogo";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo usuario
    public function insertarArticulos(string $clave, string $descripcion, string $corta)
    {
        $return = "";
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->corta = $corta;
        $sql = "SELECT * FROM catalogo WHERE clave = '{$this->clave}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO catalogo( clave, descripcion, des_corta) VALUES (?,?,?)";
            $data = array($this->clave, $this->descripcion, $this->corta);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    public function actualizarArticulos(string $clave, string $descripcion, string $corta, int $id)
    {
        $return = "";
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->corta = $corta;
        $this->id = $id;
        $query = "UPDATE catalogo SET clave=?, descripcion=?, des_corta=? WHERE id=?";
        $data = array($this->clave, $this->descripcion, $this->corta, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function editarArticulo(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM catalogo WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    public function eliminarArticulo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM catalogo WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function procesarArchivos($archivo)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($archivo);
        $hoja = $spreadsheet->getSheet(0);

        $numFilas = $hoja->getHighestRow();
        $numColumnas = $hoja->getHighestColumn();

        $return = '';

        for ($fila = 6; $fila <= $numFilas; $fila++) {
            $valor1 = $hoja->getCell(C)->getValue(); // Columna 3
            $valor2 = $hoja->getCell(I)->getValue(); // Columna 9
            $datos = [];
            $query = "INSERT INTO articulos( clave, descripcion) VALUES (?, ?)";
            $datos = array('clave' => $valor1,'descripcion' => $valor2);
            $resul = $this->insert($query, $datos);

            if ($resul) {
                $return = 'Archivo procesado exitosamente';
            } else {
                $return = 'Error al procesar el archivo';
                break; // Si ocurre un error en la inserción, se detiene el bucle
            }
        }
    
        return $return;
    }
    public function procesarArchivosG($archivo) {
        $spreadsheet = IOFactory::load($archivo);
        $hoja = $spreadsheet->getActiveSheet(0);
    
        $datos = [];
    
        foreach ($hoja->getRowIterator(6) as $fila) {
            $celdas = [];
            $cellIterator = $fila->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
    
            foreach ($cellIterator as $celda) {
                $columna = $celda->getColumn();
                if ($columna == 'CVE14' || $columna == 'DESCRIPCION') {
                    $valor = $celda->getValue();
                    $celdas[] = $valor;
                }
            }
    
            $datos[] = $celdas;
        }
    
        $conexion = new PDO('mysql:host=localhost;dbname=imss', 'root', '');
    
        foreach ($datos as $fila) {
            $valor1 = $fila[2]; // Columna "CVE14"
            $valor2 = $fila[8]; // Columna "DESCRIPCION"
    
            $query = "INSERT INTO catalogo (clave, descripcion) VALUES (?,?)";
            $data = array($this->$valor1, $this->$valor2);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }
    
        return true;
    }
    


}
?>