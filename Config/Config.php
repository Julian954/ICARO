<?php
    //CREA CONEXION CON LA BASE DE DATOS
    const BASE_URL = "http://localhost/icaro/";
    const HOST ="localhost";
    const BD = "imss";
    const DB_USER = "root";
    const PASS = "admin";
    const CHARSET = "charset=utf8";

    //DEVENGO
    const HOST2 ="localhost";
    const BD2 = "imss";
    const DB_USER2 = "root";
    const PASS2 = "admin";

    //AJUSTA EL HORARIO AL LOCAL
    date_default_timezone_set('America/Mexico_City'); 
	setlocale(LC_ALL,'es_ES', 'Spanish_Spain', 'Spanish');
    error_reporting(0); 
?>
