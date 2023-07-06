<?php
    //CREA CONEXION CON LA BASE DE DATOS
    const BASE_URL = "http://localhost/icaro/";
    const HOST ="localhost";
    const BD = "imss";
    const DB_USER = "root";
    const PASS = "admin";
    const CHARSET = "charset=utf8";

    //AJUSTA EL HORARIO AL LOCAL
    date_default_timezone_set('America/Mexico_City'); 
	setlocale(LC_ALL,'es_ES', 'Spanish_Spain', 'Spanish');
    
?>
