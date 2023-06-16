<?php
class IndicadoresModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $unidad, $surtida, $negadas, $mnuales,$costo_receta, $costo_paciente, $electronicas, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona usuarios activos
    public function selectIndicadores()
    {
        $sql = "SELECT * FROM indicadores";
        $res = $this->select_all($sql);
        return $res;
    }

    public function procesarArchivos($datos,string $fechad)
    {
        array_shift($datos);
        foreach ($datos as $fila) {
            $unidad = $fila[2] ?? '';
            $surtida = $fila[4] ?? '';
            $negadas = $fila[6] ?? '';
            $electronicas = $fila[9] ?? '';
            $mnuales = $fila[10] ?? '';
            $costo_receta = $fila[13] ?? '';
            $costo_paciente = $fila[14] ?? '';
            $this->fechad = $fechad;
          // Insertar los datos en la base de datos
          $query = "INSERT INTO indicadores (unidad,surtida,negadas,mnuales,costo_receta,costo_paciente,electronicas,fecha) VALUES (?,?,?,?,?,?,?,?)";
          $data = array($unidad, $surtida, $negadas, $mnuales,$costo_receta, $costo_paciente, $electronicas,$this->fechad);
          $resul = $this->insert($query, $data); //insert es para agregar un registro
        }
    
        return $return;
    }
}
?>