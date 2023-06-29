<?php
require 'serverside.php';
//Decia esta madre de tambien mandar el monto2 para comprobarlo y mostrar el boton
$table_data->get('vista_pedido', 'id', array(
  'id',
  'nopedido',
  'tipo',
  'clave',
  'cantidad',
  'eta',
  'topn',
  'monto',
  'fecha_alta',
  'monto2',
  function($row) {
    $monto2 = $row['monto2'];
    if ($monto2 != 0) {
      return "<span class='label label-primary'>Enlazado</span>";
    } else {
      return "<div class='btn-group'><button class='btn btn-primary btn-sm btnEditarP'>ENLAZAR</button></div>";
    }
  }
));
?>