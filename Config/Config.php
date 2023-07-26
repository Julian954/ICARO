<?php
    //CREA CONEXION CON LA BASE DE DATOS
    const BASE_URL = "http://localhost/icaro/";
    const HOST ="localhost";
    const BD = "icaro";
    const DB_USER = "root";
    const PASS = "Julian2502";
    const CHARSET = "charset=utf8mb4";

    //DEVENGO
    const HOST2 ="localhost";
    const BD2 = "imss";
    const DB_USER2 = "root";
    const PASS2 = "admin";

    //AJUSTA EL HORARIO AL LOCAL
    date_default_timezone_set('America/Mexico_City'); 
	setlocale(LC_ALL,'es_ES', 'Spanish_Spain', 'Spanish');
    //error_reporting(0); 

    //PONE EL DOMINIO PARA EL SIDEBAR
    const DOM = "icaro";
    // Establecer un nuevo límite de tiempo de ejecución a 600 segundos (10 minutos)
    set_time_limit(600);
?>
