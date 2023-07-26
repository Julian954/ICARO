<?php
class IndicadoresModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $unidad, $surtida, $negadas, $mnuales,$costo_receta, $costo_paciente, $electronicas, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

   //Selecciona el promedio de atencion y costo de los ultimos dos días
    public function historico()
    {
        $sql = "SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS surtida, SUM(importe)/SUM(presentadas) AS costor, SUM(negadas) AS negada, AVG(negadas) AS negadap, SUM(mnuales) AS manuals, SUM(importe)/SUM(atendidos) AS costop, SUM(electronicas) AS electronica,  SUM(atendidos) AS atend, SUM(presentadas) AS presen FROM indicadores";
        $res = $this->select($sql); 
        return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function ayer()
    {
        $sql = "SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS surtida, SUM(importe)/SUM(presentadas) AS costor, SUM(negadas) AS negada, AVG(negadas) AS negadap, SUM(mnuales) AS manuals, SUM(importe)/SUM(atendidos) AS costop, SUM(electronicas) AS electronica, SUM(presentadas) AS presen FROM indicadores WHERE fecha = (SELECT MAX(fecha) FROM indicadores)";
        $res = $this->select($sql); 
        return $res;
    }
    public function eliminarchivo(string $fecha)
    {
        $return = "";        
        $this->fecha = $fecha;                
            $query = "DELETE FROM indicadores WHERE fecha = '{$this->fecha}'";            
            $resul = $this->delete($query);
            $return = $resul;        
        return $return;
    }
    public function negadas()
    {
        $sql = "SELECT fecha, SUM(negadas) AS negadas FROM indicadores GROUP BY fecha ORDER BY fecha DESC LIMIT 2";
        $res = $this->select_all($sql); 
        return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function rankingdiario()
    {
        $sql = "SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS colima, AVG(atencion) AS nacional FROM (SELECT presentadas, negadas, NULL AS atencion FROM indicadores UNION ALL SELECT NULL AS presentadas, NULL AS negadas, atencion FROM nacional) AS datos_totales;";
        $res = $this->select($sql); 
        return $res;
    }
    
    //Selecciona las negadas más recientes
    public function nacional()
    {
        $sql = "SELECT (SELECT MIN(ranking) FROM nacional) AS maximo, (SELECT ranking FROM nacional ORDER BY fecha DESC LIMIT 1) AS ultimo;";
        $res = $this->select($sql);
        return $res;
    }

    //Selecciona las quejas
    public function maxnegada()
    {
        $sql = "SELECT SUM(negadas) AS nega FROM indicadores GROUP BY fecha ORDER BY nega DESC LIMIT 1";
        $res = $this->select($sql);
        return $res;
    }

    public function ranking()
    {
        $sql = "SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS colima, AVG(atencion) AS nacional, DATE_FORMAT(fecha, '%M') AS mname, MONTH(fecha) AS mes FROM (SELECT fecha, negadas, presentadas, NULL AS atencion FROM indicadores UNION ALL SELECT fecha, NULL AS negadas, NULL AS presentadas, atencion FROM nacional) AS datos_totales GROUP BY mes, mname;";
        $res = $this->select_all($sql); 
        return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function promnegadas()
    {
        $sql = "SELECT AVG(total) AS promedio FROM ( SELECT fecha, SUM(negadas) AS total FROM indicadores GROUP BY fecha ) AS subconsulta;";
        $res = $this->select($sql); 
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
        $surtida = $fila[4] ?? '';
        $negadas = $fila[7] ?? '';
        $electronicas = $fila[10] ?? '';
        $mnuales = $fila[11] ?? '';
        $atendidos = $fila[12] ?? '';
        $costo_receta = $fila[14] ?? '';
        $importe = $fila[13] ?? '';
        $costo_paciente = $fila[15] ?? '';
        $this->fechad = $fechad;

        if (!empty($unidad)) {
            // Insertar los datos en la base de datos
            $query = "INSERT INTO indicadores (unidad, surtida, presentadas, negadas, mnuales, atendidos, costo_receta, importe, costo_paciente, electronicas, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
            $data = array($unidad, $presentadas, $surtida, $negadas, $mnuales, $atendidos, $costo_receta, $importe, $costo_paciente, $electronicas, $this->fechad);
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
