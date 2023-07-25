<?php
class ExcelModel extends Mysql{ 
    public $id, $area, $usuario, $tipo, $plataforma, $tipocontrata  ;

    public function __construct()
    {
        parent::__construct();
    }

        public function fechain()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM indicadores";
            $res = $this->select($sql);
            return $res;
        }

        public function fechane()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM negadas";
            $res = $this->select($sql);
            return $res;
        }

        public function fechana()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM nacional";
            $res = $this->select($sql);
            return $res;
        }

        public function fechap()
        {
            $sql = "SELECT MAX(fecha) AS fecha FROM pedidos";
            $res = $this->select($sql);
            return $res;
        }

}
?>