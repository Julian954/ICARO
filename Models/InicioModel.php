<?php
class InicioModel extends Mysql{ 
    public $id, $area, $usuario, $tipo, $plataforma, $tipocontrata, $fecha, $gpo , $gen , $fechaN;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona el promedio de atencion y costo de los ultimos dos días
    public function nivelatencionycosto()
    {
        $sql = "SELECT fecha, (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS surtida, SUM(importe)/SUM(presentadas) AS costo FROM indicadores GROUP BY fecha ORDER BY fecha DESC LIMIT 2";
        $res = $this->select_all($sql); 
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
    //Selecciona las negadas más recientes
    public function negadas()
    {
        $sql = "SELECT unidades.nombre, indicadores.negadas, indicadores.fecha FROM indicadores, unidades WHERE indicadores.unidad = unidades.clave ORDER BY fecha DESC";
        $res = $this->select_all($sql);
        return $res;
    }
    public function contratos3(){
        $sql = "SELECT numero, descripcion, termino, maximo, devengo, contratos.estado, nombre FROM contratos INNER JOIN usuarios ON contratos.administrador = usuarios.id";
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
        $ordenar ="SELECT SUM(monto) AS monto, SUM(pagado) AS pagado, MONTHNAME(fecha_inicio) AS mes, MONTH(fecha_inicio) AS nom FROM pedidos GROUP BY mes, nom ORDER BY nom ASC;";
        $res = $this->select_all($ordenar);
        return $res;
    }

    public function pedidosfecha()
    {
        $ordenar ="SELECT * FROM pedidos;";
        $res = $this->select_all($ordenar);
        return $res;
    }

    public function unidades()
    {        
        $sql ="SELECT * FROM unidades";
        $res= $this->select_all($sql);
        return $res;
    }

    public function despachos(string $hoy){   
        $this->hoy=$hoy;     
        $sql = "SELECT despachos.*, unidades.abreviacion FROM despachos, unidades WHERE despachos.unidad = unidades.id AND cast(fecha_entrega AS DATE) = '{$this->hoy}'";
        $res = $this->select_all($sql);
            return $res;
    }

    //Selecciona la suma de negadas y manuales de los ultimos dos días
    public function rankingdiario()
    {  
        $sql = "SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS colima, AVG(atencion) AS nacional, fecha AS dia FROM (SELECT fecha, surtida, NULL AS atencion FROM indicadores UNION ALL SELECT fecha, NULL AS surtida, atencion FROM nacional) AS datos_totales GROUP BY dia;";
        $res = $this->select_all($sql); 
        return $res;
    }

    //Selecciona las negadas actuales por clínica
    public function Gpastelnegadas()
    {
        $sql = "SELECT unidades.abreviacion, indicadores.negadas, indicadores.fecha FROM indicadores, unidades WHERE indicadores.unidad = unidades.clave AND fecha = (SELECT MAX(fecha) FROM indicadores) ORDER BY `indicadores`.`negadas` DESC LIMIT 5";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las negadas actuales por clínica
    public function Gpastelnegadasotros()
    {
        $sql = "SELECT 'Otros' AS abreviacion, SUM(negadas) AS negadas, fecha FROM ( SELECT negadas, fecha, ROW_NUMBER() OVER (ORDER BY negadas DESC) AS row_num FROM indicadores WHERE fecha = (SELECT MAX(fecha) FROM indicadores) ) AS subconsulta WHERE row_num > 5";
        $res = $this->select($sql);
        return $res;
    }












    public function datos_de_foro_para_noti(){
        
        $sql = "SELECT * FROM detalle_cont INNER JOIN validar_cont ON validar_cont.id_contrato = detalle_cont.contrato INNER JOIN usuarios ON detalle_cont.id_responde = usuarios.id";
        $res = $this->select_all($sql);
            return $res;
    }




    public function datos_de_foro_para_noti2(){
        
        $sql = "SELECT * FROM detalle_contrata INNER JOIN validar_contrata ON validar_contrata.id_contrato = detalle_contrata.contrato INNER JOIN usuarios ON detalle_contrata.id_responde = usuarios.id";
        $res = $this->select_all($sql);
            return $res;
    }



    public function eliminar_datos(string $fecha)
{
        $this->fecha = $fecha;
            $query = "DELETE FROM negadas WHERE fecha = ?";
            $data = array($this->fecha);
            $resul = $this->insert($query, $data); //insert es para agregar un registro
        
    return $return;
}
    public function atencioncolima(string $fechaN)
    {
        $this->fecha = $fechaN;
        $ordenar ="SELECT (SUM(presentadas)-SUM(negadas))/SUM(presentadas)*100 AS colima FROM indicadores WHERE fecha = '{$this->fecha}' GROUP BY fecha";
        $res= $this->select($ordenar);
        return $res;
    }

    public function atencionnacional(string $fechaN)
    {
        $this->fecha = $fechaN;
        $ordenar ="SELECT AVG(atencion) AS mnacional FROM nacional WHERE fecha = '{$this->fecha}' GROUP BY fecha";
        $res= $this->select($ordenar);
        return $res;
    }

    public function insertarQueja(string $descripcion, int $piezas, int $umf, int $receta)
    {
        $return = "";
        $this->descripcion = $descripcion; 
        $this->piezas = $piezas; 
        $this->umf = $umf; 
        $this->receta = $receta;                            
        $query = "INSERT INTO quejas(descripcion, piezas, umf, receta) VALUES (?,?,?,?)";
        $data = array($this->descripcion, $this->piezas, $this->umf, $this->receta);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }




   public function Actualizar_Queja(int $id, int $estado)
    {
        $return = "";       
        $this->estado = $estado;
        $this->id = $id;        
        $query = "UPDATE quejas SET estado=? WHERE id=?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data); //Update es para actualizar un registro
        $return = $resul;
        return $return;
    }



    //Selecciona las áreas
    public function SelectAreas()
    {
        $sql = "SELECT * FROM areas";
        $res = $this->select_all($sql);
        return $res;
    }
    public function ordenarnegad(string $fechaN)
    {
        $this->fecha = $fechaN;
        $ordenar ="SELECT * FROM `negadas` WHERE fecha='{$this->fecha}'  ORDER BY `negadas`.`negadas` DESC";
        $res= $this->select_all($ordenar);
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

    //Seleccionar el tipo de contratacion
    public function contratos()
    {
        $sql = "SELECT numero, descripcion, area, categoria, tipo, termino, maximo, fianza, plataforma, fecha FROM contratos";
        $res = $this->select_all($sql);
        return $res;
    }

    //Seleccionar el tipo de contratacion
    public function requerimeintos()
    {
        $sql = "SELECT nooficio, descripcion, area, categoria, dictamen, termino, maximo, contrato, contratacion, inicio FROM contrataciones";
        $res = $this->select_all($sql);
        return $res;
    }

    //Seleccionar el tipo de contratacion
    public function pedidosd()
    {
        $sql = "SELECT nopedido, tipo, clave, noalta, proveedor, fecha_inicio, cantidad, eta, fecha_alta, monto, pagado FROM pedidos";
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
    public function eliminarorden(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM negadas WHERE id='{$this->id}' ";
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
        $query = "DELETE FROM usuarios WHERE id= '{$this->id}'";
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
    public function eliminarank(string $fecha)
    {
        $return = "";        
        $this->fecha = $fecha;                
            $query = "DELETE FROM nacional WHERE fecha = '{$this->fecha}'";            
            $resul = $this->delete($query);
            $return = $resul;        
        return $return;
    }
    public function eliminarchivo(string $fecha)
    {
        $return = "";        
        $this->fecha = $fecha;                
            $query = "DELETE FROM  negadas WHERE fecha = '{$this->fecha}'";            
            $resul = $this->delete($query);
            $return = $resul;        
        return $return;
    }
    public function selectDictamen()
    {
        $sql = "SELECT * FROM dictamen";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo usuario
    public function insertarDictamen(string $dictamen, string $monto)
    {
        $return = "";
        $this->dictamen = $dictamen;
        $this->monto = $monto;
        $sql = "SELECT * FROM dictamen WHERE dictamen = '{$this->dictamen}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO dictamen( dictamen, montomax) VALUES (?,?)";
            $data = array($this->dictamen, $this->monto);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    
    public function eliminarDictamen(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM dictamen WHERE id= '{$this->id}'";
        $resul = $this->delete($query);
        $return = $resul;
        return $return;
    }


    public function procesarArchivos($datos)
    {
        array_splice($datos, 0,1);
        foreach ($datos as $fila) {
          $dictamen = $fila[0] ?? ''; // Valor de la columna "GPO" en el archivo CSV
          $monto= $fila[1] ?? ''; // Valor de la columna "ESP" en el archivo CSV
        
            if (!empty($monto) && !empty($dictamen)) {
            $query = "INSERT INTO dictamen (dictamen, montomax) VALUES (?,?)";
            $data = array($dictamen, $monto);
            $resul = $this->insert($query, $data); //insert es para agregar un registro
        }

        }
    
        return $return;
    }

    public function insertar_datos($datos, string $fecha) {
        array_splice($datos, 0, 3);

        foreach ($datos as $fila) {
            $gpo = $fila[6] ?? '';
            $gen = $fila[7] ?? '';
            $esp = $fila[8] ?? '';
            $dif = $fila[9] ?? '';
            $var = $fila[10] ?? '';
            $clave = $gpo . $gen . $esp . $dif . $var;
            $cmp = $fila[27] ?? '';
            $consumo = $fila[34] ?? '';
            $unidades = $fila[36] ?? '';
            $almacen = $fila[38] ?? '';
            $negadas = $fila[112] ?? '';
            $copel = $fila[52] ?? '';
            $unops = $fila[53] ?? '';
            $ooad = $fila[54] ?? '';
            $pedidos = $fila[55] ?? '';
            $transooad = $fila[56] ?? '';
            $fecha_inc = $fila[82] ?? '';
            $fechaN = $fecha;

            if(!empty($clave) && !empty($negadas) && ($negadas != 0)){    
                // Insertar los datos en la base de datos
                $query = "INSERT INTO negadas(clave, cmp, consumo, unidades, almacen, negadas, fecha_inc, copel, unops, ooad, pedidos, transooad, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $data = array($clave, $cmp, $consumo, $unidades, $almacen, $negadas, $fecha_inc, $copel, $unops, $ooad, $pedidos, $transooad,$fechaN);
                $resul = $this->insert($query, $data); // insert es para agregar un registro
            }
        }
    }     


        public function notifica()
        {
            $sql = "SELECT * FROM notificaciones WHERE usuario = '{$_SESSION['id']}' AND estado = 1";
            $res = $this->select_all($sql);
            return $res;
        }

        //actualizar intento de validar
        public function elimnoti(string $estado, string $id)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE notificaciones SET estado = ? WHERE id = ?";
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }
    
    
}
?>