<?php

function base_url()
{
    return BASE_URL;
}
function encabezado($data="")
{
    $VistaH = 'Views/Template/header.php';
    require_once($VistaH);
}
function permisos($data="")
{
    $VistaPe = 'Views/Errors/Permisos.php';
    require_once($VistaPe);
}
function links($data="")
{
    $VistaL = 'Views/Template/links.php';
    require_once($VistaL);
}
function pie($data="")
{
    $VistaP = 'Views/Template/footer.php';
    require_once($VistaP);
}
function referencias($data="")
{
    $VistaP = 'Views/Template/referencias.php';
    require_once($VistaP);
}

function limpiarInput($dato) {
    // Eliminar espacios en blanco al principio y al final
    $dato = trim($dato);
    // Eliminar barras invertidas
    $dato = stripslashes($dato);
    // Convertir caracteres especiales en entidades HTML
    $dato = htmlspecialchars($dato);
    return $dato;
}

//NOTIFICACIONES
function notificaciones() {  

	// Configuración de la conexión a la base de datos
    $servername = HOST;
    $username = DB_USER;
    $password = PASS;
    $dbname = BD;

    try {
        // Crear una nueva conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configurar el modo de error de PDO para mostrar excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ejecutar la consulta
        $sql = "SELECT * FROM detalle_cont INNER JOIN validar_cont ON validar_cont.id_contrato = detalle_cont.contrato INNER JOIN usuarios ON detalle_cont.id_responde = usuarios.id";
        $querry = $conn->prepare($sql);
        $querry->execute();
        $data1 = $querry->fetchAll(PDO::FETCH_ASSOC);

        $sql1 = "SELECT * FROM detalle_contrata INNER JOIN validar_contrata ON validar_contrata.id_contrato = detalle_contrata.contrato INNER JOIN usuarios ON detalle_contrata.id_responde = usuarios.id";
        $querry1 = $conn->prepare($sql1);
        $querry1->execute();
        $data2 = $querry1->fetchAll(PDO::FETCH_ASSOC);

    	$sql2 = "SELECT * FROM contrataciones";
        $querry2 = $conn->prepare($sql2);
        $querry2->execute();
        $data3 = $querry2->fetchAll(PDO::FETCH_ASSOC);

    	$sql3 = "SELECT * FROM contratos";
        $querry3 = $conn->prepare($sql3);
        $querry3->execute();
        $data4 = $querry3->fetchAll(PDO::FETCH_ASSOC);

    	$sql4 = "SELECT * FROM validar_cont";
        $querry4 = $conn->prepare($sql4);
        $querry4->execute();
        $data5 = $querry4->fetchAll(PDO::FETCH_ASSOC);

    	$sql5 = "SELECT * FROM detalle_contrata";
        $querry5 = $conn->prepare($sql5);
        $querry5->execute();
        $data6 = $querry5->fetchAll(PDO::FETCH_ASSOC);

        $i = 0;

        if($_SESSION['rol'] ==4 || $_SESSION['rol'] ==3){
            foreach($data1 as $contratos){ 
            	if($contratos['id_responde']!=$_SESSION['id']  && $contratos['visto']==0){ 
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==4 || $_SESSION['rol'] ==3){
            foreach($data2 as $contrata){ 
            	if($contrata['id_responde']!=$_SESSION['id']  && $contrata['visto']==0){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data3 as $requerimiento){ 
            	if($requerimiento['estado']==3 && $requerimiento['visto']==0){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data3 as $requerimiento2){ 
            	if($requerimiento2['estado']==3 && $requerimiento2['visto']==1){
                $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data4 as $contratacion){ 
            	if($contratacion['estado']==3 && $contratacion['visto']==0){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data4 as $rcontratacion2){ 
            	if($rcontratacion2['estado']==3 && $rcontratacion2['visto']==1){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data4 as $vencer){ 
                $fechaActual = new DateTime($vencer['termino']); 
                $fechaPasada = new DateTime('-1 year'); 
                $intervalo = $fechaActual->diff($fechaPasada); 
                $diasFaltantes = $intervalo->days; 
            	if($diasFaltantes==15 && $vencer['visto']!=3){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data3 as $vence2){ 
                $fechaActual = new DateTime($vence2['termino']); 
                $fechaPasada = new DateTime('-1 year'); 
                $intervalo = $fechaActual->diff($fechaPasada); 
                $diasFaltantes = $intervalo->days; 
            	if($diasFaltantes==15 && $vence2['visto']!=3){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==3){
            foreach($data5 as $asignar){ 
            	if($asignar['id_validador']==$_SESSION['id'] && $asignar['visto']==0){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==3){
            foreach($data6 as $asignar2){ 
            	if($asignar2['id_validador']==$_SESSION['id'] && $asignar2['visto']==0){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data4 as $tercer_dia){ 
                $fechaPasada = new DateTime($tercer_dia['fecha_validado']); 
                $fechaActual = new DateTime(); 
                $intervalo = $fechaActual->diff($fechaPasada); 
                $diasTranscurridos = $intervalo->days; 
            	if($diasTranscurridos==3 && $tercer_dia['visto']!=3 && $tercer_dia['estado']==3){
                    $i++;
            	}
            }
        }

        if($_SESSION['rol'] ==7){
            foreach($data3 as $tercer_dia2){ 
                $fechaPasada = new DateTime($tercer_dia2['fecha_validado']); 
                $fechaActual = new DateTime(); 
                $intervalo = $fechaActual->diff($fechaPasada); 
                $diasTranscurridos = $intervalo->days; 
            	if($diasTranscurridos==3 && $tercer_dia2['visto']!=3 && $tercer_dia2['estado']==3){
                    $i++;
            	}
            }
        }

       // Cerrar la conexión
       $conn = null;
    } catch (PDOException $e) {
       echo "Error de conexión: " . $e->getMessage();
    }
										
    //VARIABLES GLOBALES
    $dato = $i;
    return $dato;
}

//FORMATO TEXTO MAYUSCULAS
function mayusculas($dato) {

    $dato = strtoupper($dato);

    return $dato;
}

//FORMATO TEXTO MAYUSCULAS
function telefono($dato) {

    $dato = "(".substr($dato,0,3).")"." ".substr($dato,5,3)."-".substr($dato,6,4);

    return $dato;
}

//FORMATO TEXTO
function string($dato) {

    $dato = ucfirst(strtolower($dato));

    return $dato;
}

//FORMATO K NUMERO
function formatoK($dato) {
    if ($dato >= 1000) {
        $dato = number_format($dato / 1000, 1) . 'k';
    } else {
        $dato = number_format($dato,0,'.',',');
    }
    return $dato;
}

//FORMATO K decimal
function formatokdecimal($dato) {
    if ($dato >= 1000) {
        $dato = number_format($dato / 1000, 1) . 'k';
    } else {
        $dato = number_format($dato,1,'.',',');
    }
    return $dato;
}

//FORMATO NUMERO ENTEROS MILES
function miles($dato) {
    $dato = number_format($dato,0,'.',',');
    return $dato;
}

//FORMATO NUMERO DECIMALES MILES
function decimales($dato) {
    $dato = number_format($dato,2,'.',',');
    return $dato;
}

// Utilizar los espacios de nombres necesarios
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

/* Clase para tratar con excepciones y errores */
require 'Assets/PHPMailer/src/Exception.php';
/* Clase PHPMailer */
require 'Assets/PHPMailer/src/PHPMailer.php';
/*Clase SMTP necesaria para conectarte a un servidor SMTP */
require 'Assets/PHPMailer/src/SMTP.php';

function correo($msg, $asunto, $correo, $nombre){


        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);

        // Configurar el servidor SMTP externo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; // Puerto SMTP (puede variar según el proveedor)
        $mail->SMTPAuth = true;
        $mail->Username = 'icaroooard@gmail.com';
        $mail->Password = 'awrnsqgtshsaxlie';
        $mail->SMTPSecure = 'ssl';
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);


        // Establecer otros parámetros del correo
        $mail->setFrom('icaroooard@gmail.com', 'ICARO');
        $mail->addAddress($correo, $nombre);
        $mail->Subject = $asunto;
        $mail->Body = $msg."<br><br>".'Mensaje generado automaticamente, favor de no responder.';
        $mail->send();

}


?>