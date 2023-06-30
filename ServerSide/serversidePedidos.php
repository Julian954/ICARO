<?php
require 'serverside.php';
//Decia esta madre de tambien mandar el monto2 para comprobarlo y mostrar el boton
$table_data->get('vista_pedidos', 'id', array(
  'id',
  'nopedido',
  'tipo',
  'clave',
  'cantidad',
  'eta',
  'topn',
  'monto',
  'fecha_alta',
));
?>