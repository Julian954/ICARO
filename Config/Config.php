<?php
    const BASE_URL = "http://localhost/IMSS/";
    const HOST = "localhost:3308";
    const BD = "imss";
    const DB_USER = "root";
    const PASS = "";
    const CHARSET = "charset=utf8";
    
    //coneccion para la vista de pedidos
    $HOST= "localhost:3308";
    $BD_USER= "root";
    $PASS = "";
    $basededatos="imss";
    $con=mysqli_connect($HOST, $BD_USER, $PASS) or die ("error al conectarse");
    mysqli_query($con, "SET SESSION collation = 'utf8_unicode_ci'");
    $db=mysqli_select_db($con, $basededatos)or die("ups");
?>
