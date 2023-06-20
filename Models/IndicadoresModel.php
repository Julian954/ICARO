<?php
class IndicadoresModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $unidad, $surtida, $negadas, $mnuales,$costo_receta, $costo_paciente, $electronicas, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

    //Se pueden hacer 5 tipo de consultas
    public function nivelatencionycosto()
    {
        $sql = "SELECT fecha, AVG(surtida) AS surtida, AVG(costo_receta) AS costo FROM indicadores GROUP BY fecha ORDER BY fecha DESC LIMIT 2";
        $res = $this->select_all($sql); 
        return $res;
    }

    //Se pueden hacer 5 tipo de consultas
    public function negadasymanuales()
    {
        $sql = "SELECT fecha, SUM(negadas) AS negadas, SUM(mnuales) AS manuales FROM indicadores GROUP BY fecha ORDER BY fecha DESC LIMIT 2";
        $res = $this->select_all($sql); //select_all es para seleccionar cuando el resultado puede arrojar muchas filas
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
        $presentadas = $fila[4] ?? '';
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

}



//SUMA POR DÍA (NEGADAS)
// SELECT SUM(negadas) AS suma FROM indicadores GROUP BY fehca;

//SUMA POR DÍA (MANUALES)
// SELECT SUM(mnuales) AS suma FROM indicadores GROUP BY fehca;



//PROMEDIO POR DÍA (NIVEL DE ATENCION GRAFICA)
// SELECT AVG(surtida) AS promedio FROM indicadores GROUP BY fehca;



?>
