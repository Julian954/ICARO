<?php
class IndicadoresModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $unidad, $surtida, $negadas, $mnuales,$costo_receta, $costo_paciente, $electronicas, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

   //Selecciona el promedio de atencion y costo de los ultimos dos días
    public function nivelatencionycosto()
    {
        $sql = "SELECT AVG(surtida) AS surtida, AVG(costo_receta) AS costor, SUM(negadas) AS negada, AVG(negadas) AS negadap, SUM(mnuales) AS manuals, AVG(costo_paciente) AS costop, SUM(electronicas) AS electronica FROM indicadores";
        $res = $this->select($sql); 
        return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function negadasymanuales()
    {
        $sql = "SELECT fecha, SUM(negadas) AS negadas, SUM(mnuales) AS manuales FROM indicadores GROUP BY fecha ORDER BY fecha DESC LIMIT 2";
        $res = $this->select_all($sql); 
        return $res;
    }
    
    //Selecciona las negadas más recientes
    public function top15negadas()
    {
        $sql = "SELECT negadas.*, catalogo.des_corta FROM negadas, catalogo WHERE negadas.clave = catalogo.clave AND negadas.fecha = (SELECT MAX(fecha) FROM negadas)";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las quejas
    public function quejas()
    {
        $sql = "SELECT quejas.*, unidades.abreviacion FROM quejas, unidades WHERE quejas.umf = unidades.id";
        $res = $this->select_all($sql);
        return $res;
    }

    public function pedidos()
    {
        $ordenar ="SELECT COUNT(nopedido), COUNT(fecha_alta), MONTH(fecha_alta) AS mes FROM pedidos GROUP BY mes";
        $res= $this->select_all($ordenar);
        return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function ranking()
    {
        $sql = "SELECT AVG(surtida) AS colima, AVG(atencion) AS nacional, MONTH(fecha) AS mes FROM (SELECT fecha, surtida, NULL AS atencion FROM indicadores UNION ALL SELECT fecha, NULL AS surtida, atencion FROM nacional) AS datos_totales GROUP BY mes";
        $res = $this->select_all($sql); 
        return $res;
    }


    
    //Selecciona usuarios activos
    public function selectIndicadores()
    {
        $sql = "SELECT * FROM indicadores";
        $res = $this->select_all($sql);
        return $res;
    }

    public function procesarArchivos($datos, string $fechad)
{
    array_splice($datos, 0, 1);
    foreach ($datos as $fila) {
        $unidad = $fila[2] ?? '';
        $presentadas = $fila[9] ?? '';
        $surtida = $fila[5] ?? '';
        $negadas = $fila[7] ?? '';
        $electronicas = $fila[10] ?? '';
        $mnuales = $fila[11] ?? '';
        $atendidos = $fila[11] ?? '';
        $costo_receta = $fila[14] ?? '';
        $costo_paciente = $fila[15] ?? '';
        $this->fechad = $fechad;

        if (!empty($unidad)) {
            // Insertar los datos en la base de datos
            $query = "INSERT INTO indicadores (unidad, surtida, presentadas, negadas, mnuales, atendidos, costo_receta, costo_paciente, electronicas, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)";
            $data = array($unidad, $presentadas, $surtida, $negadas, $mnuales, $atendidos, $costo_receta, $costo_paciente, $electronicas, $this->fechad);
            $resul = $this->insert($query, $data); //insert es para agregar un registro
        }
    }

    return $return;
}

public function Eliminar_Archivo(string $fechad)
{
        $this->fechad = $fechad;
            $query = "DELETE FROM indicadores WHERE fecha = ?";
            $data = array($this->fechad);
            $resul = $this->insert($query, $data); //insert es para agregar un registro
        
    return $return;
}
}



//SUMA POR DÍA (NEGADAS)
// SELECT SUM(negadas) AS suma FROM indicadores GROUP BY fehca;

//SUMA POR DÍA (MANUALES)
// SELECT SUM(mnuales) AS suma FROM indicadores GROUP BY fehca;



//PROMEDIO POR DÍA (NIVEL DE ATENCION GRAFICA)
// SELECT AVG(surtida) AS promedio FROM indicadores GROUP BY fehca;



?>
