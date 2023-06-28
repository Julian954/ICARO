<?php
require 'serverside.php';
$table_data->get('vista_pedidos','id',array('id', 'nopedido', 'tipo', 'clave', 'cantidad', 'eta' , 'topn', 'monto', 'fecha_alta'));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: modal.php");
  }
  
?>