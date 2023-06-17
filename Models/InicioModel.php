<?php
class InicioModel extends Mysql{ 
    public $id, $area, $usuario, $tipo, $plataforma, $tipocontrata, $fecha, $gpo , $gen;
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

    //Selecciona las áreas
    public function SelectAreas()
    {
        $sql = "SELECT * FROM areas";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona los tipos
    public function SelectTipo()
    {
        $sql = "SELECT * FROM tipos";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las plataformas
    public function SelectPlataforma()
    {
        $sql = "SELECT * FROM plataformas";
        $res = $this->select_all($sql);
        return $res;
    }
    //Seleccionar el tipo de contratacion
    public function SelectTipoContratacion()
    {
        $sql = "SELECT * FROM tipocontrata";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega Area
    public function agregarArea(string $Area, string $Usuario)
    {
        $return = "";
        $this->Area = $Area;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO areas(area, usuario) VALUES (?,?)";
        $data = array($this->Area, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Area
    public function eliminarArea(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM areas WHERE id='{$this->id}' ";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }

    //Agrega Tipo
    public function AgregarTipo(string $Tipo, string $Usuario)
    {
        $return = "";
        $this->Tipo = $Tipo;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO tipos(tipo, usuario) VALUES (?,?)";
        $data = array($this->Tipo, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Tipo
    public function EliminarTipo(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM tipos WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }

    //Agrega Plataforma
    public function AgregarPlataforma(string $Plataforma, string $Usuario)
    {
        $return = "";
        $this->Plataforma = $Plataforma;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO plataformas(plataforma, usuario) VALUES (?,?)";
        $data = array($this->Plataforma, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Plataforma
    public function EliminarPlataforma(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM plataformas WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }
    //Agregar contratacion tipo
    public function AgregarTipoContratacion(string $TipoContrata, string $Usuario)
    {
        $return = "";
        $this->Contrataciones = $TipoContrata;
        $this->Usuario = $Usuario;
        $query = "INSERT INTO tipocontrata(tipoco, usuario) VALUES (?,?)";
        $data = array($this->Contrataciones, $this->Usuario);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //Elimina Tipo de contratacion
    public function EliminarTipoContratacion(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM tipocontrata WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }

    public function insertarUsuarios(string $nombre, string $usuario, string $clave, string $rol, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->correo = $correo;
        $query = "INSERT INTO usuarios(nombre, usuario, clave, rol, correo) VALUES (?,?,?,?,?)";
        $data = array($this->nombre, $this->usuario, $this->clave, $this->rol, $this->correo);
        $resul = $this->insert($query, $data); //insert es para agregar un registro
        return $resul;
    }

    //Edita los datos de un usuario
    public function actualizarUsuarios(string $nombre, string $usuario, string $rol, int $id, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->rol = $rol;
        $this->id = $id;
        $this->correo = $correo;
        $query = "UPDATE usuarios SET nombre=?, usuario=?, rol=?, correo=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->rol, $this->correo, $this->id);
        $resul = $this->update($query, $data); //Update es para actualizar un registro
        $return = $resul;
        return $return;
    }

    //Validad contraseña de usuario
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql); //selectç es para seleccionar cuando el resultado solo arroja una fila
        return $res;
    }

    //Elimina los datos de un usuario
    public function eliminarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE usuarios WHERE id= '{$this->id}'";
        $resul = $this->delate($query); //DELATE es para ELIMINAR un registro
        $return = $resul;
        return $return;
    }

    public function insertarrank(string $satisfaccion, string $rank, string $fecha)
    {
        $return = "";
        $this->satisfaccion = $satisfaccion;        
        $this->rank = $rank;
        $this->fecha = $fecha;                
            $query = "INSERT INTO nacional(atencion, ranking, fecha) VALUES (?,?,?)";
            $data = array($this->satisfaccion, $this->rank, $this->fecha);
            $resul = $this->insert($query, $data);
            $return = $resul;        
        return $return;
    }

    public function insertar_datos($datos, string $fecha) {
        array_splice($datos, 0, 3);
        foreach ($datos as $fila) {
          $gpo = $fila[6]??'';
          $gen = $fila[7]??'';
          $esp = $fila[8]??'';
          $dif = $fila[9]??'';
          $var = $fila[10]??'';
          $clave = $gpo . $gen . $esp . $dif . $var;
          $cmp = $fila[27] ?? ''; 
          $consumo = $fila[34] ?? ''; 
          $unidades = $fila[36] ?? ''; 
          $almacen = $fila[38] ?? ''; 
          $negadas = $fila[112] ?? ''; 
          $fechaN = $fecha;

          // Insertar los datos en la base de datos
          $query = "INSERT INTO negada(clave, cmp, consumo, unidades, almacen, negadas,fecha) VALUES (?, ?, ?, ?, ?, ?, ?)";
          $data = array($clave, $cmp, $consumo, $unidades, $almacen, $negadas, $fechaN);
          $resul = $this->insert($query, $data); //insert es para agregar un registro
        }
    }      
    
    
}
?>