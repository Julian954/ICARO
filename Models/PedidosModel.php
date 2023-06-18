<?php
class PedidosModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil; //Aquí van las variables que están en la base de datos, podemos dejarlas en blanco pero ponerlas aquí facilita el trabajo
    public function __construct()
    {
        parent::__construct();
    }

    //Se pueden hacer 5 tipo de consultas
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $res = $this->select_all($sql); //select_all es para seleccionar cuando el resultado puede arrojar muchas filas
        return $res;
    }

    //Registra un nuevo usuario
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
    //Unidade de aqui para abajo
    public function SelectUnidades(){        
        $sql = "SELECT * FROM unidades";
        $res = $this->select_all($sql);
        return $res;
    }
    public function editarUnidades(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM unidades WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarUnidades(string $nombre, int $clave, string $abreviacion, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->abreviacion = $abreviacion;
        $this->id = $id;        
        $query = "UPDATE unidades SET clave=?, nombre=?, abreviacion=? WHERE id=?";
        $data = array($this->clave, $this->nombre, $this->abreviacion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function insertarUnidades(string $nombre, int $clave, string $abreviacion)
    {
        $return = "";
        $this->nombre = $nombre;        
        $this->clave = $clave;
        $this->abreviacion = $abreviacion;                
            $query = "INSERT INTO unidades(clave, nombre, abreviacion) VALUES (?,?,?)";
            $data = array($this->clave, $this->nombre, $this->abreviacion);
            $resul = $this->insert($query, $data);
            $return = $resul;        
        return $return;
    }

    public function eliminarUnidades(int $id)
    {
        $return = "";
        $this->id = $id;        
        $query = "DELETE FROM unidades WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    //hasta aqui son las unidades

    public function insertar_datos($datos, string $fecha) {
        array_splice($datos, 0, 11);
        foreach ($datos as $fila) {
          $nopedido = $fila[4]??'';//E
          $tipo = $fila[7]??'';//H
          $gen = $fila[8]??'';//i
          $clave = $fila[9]??'';//J
          $dif= $fila[10]??'';//K
          $var= $fila[11]??'';//L
          $topn = $tipo . $gen . $clave . $dif . $var; //H-L
          $cantidad = $fila[25]??'';//Z
          $proveedor = $fila[28]??'';//AC
          $noalta = $fila[34]??'';//AI
          $fecha_alta = $fila[33] ?? ''; //AH
          $monto = $fila[42] ?? '';//AQ
          $pagado = $fila[44] ?? '';//AS
          $this->fecha = $fecha;

          if (!empty($nopedido) && !empty($tipo) && !empty($proveedor) && !empty($topn) && !empty($cantidad)) {
          // Insertar los datos en la base de datos
          $query = "INSERT INTO pedidos(nopedido, tipo, clave, noalta, proveedor, cantidad, topn, fecha_alta, monto, pagado , fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $data = array($nopedido, $tipo, $clave, $noalta, $proveedor, $cantidad, $topn, $fecha_alta,$monto, $pagado , $this->fecha);
          $resul = $this->insert($query, $data); //insert es para agregar un registro
          }
        }
    }
}
?>