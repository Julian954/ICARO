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
        $sql = "SELECT COUNT(*) AS total FROM notificaciones WHERE usuario = '{$_SESSION['id']}' AND estado = 1";
        $querry = $conn->prepare($sql);
        $querry->execute();
        $data = $querry->fetchAll(PDO::FETCH_ASSOC);

       // Cerrar la conexión
       $conn = null;
    } catch (PDOException $e) {
       echo "Error de conexión: " . $e->getMessage();
    }
							
    //VARIABLES GLOBALES
    $dato = $data[0]['total'];
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

        // Verificar si Outlook está en ejecución
        $command = 'tasklist /FI "IMAGENAME eq OUTLOOK.EXE" /NH';
        $output = shell_exec($command);

        if (strpos($output, 'OUTLOOK.EXE') !== false) {
            // Outlook está en ejecución, cerrarlo antes de continuar
            $command = 'taskkill /F /IM OUTLOOK.EXE';
            shell_exec($command);
        }

        try {
            $objApp = new COM("Outlook.Application") or die("No se pudo cargar Outlook.Application");
            $namespace = $objApp->GetNamespace("MAPI");
            $namespace->Logon("Outlook");
            $myItem = $objApp->CreateItem(0);
            $myItem->To = $correo;
            $myItem->SentOnBehalfOfName = "cdi.colima@imss.gob.mx"; //CORREO Outlook
            $myItem->Subject = $asunto;
            $myItem->HTMLBody = '<html><body>'.$msg.'<br><br>'.'Mensaje generado automaticamente, favor de no responder.</body></html>';
            $myItem->Send();
            $objApp->Quit(); // Cierra la aplicación Outlook
            $objApp = null; // Libera el objeto COM
        } catch (Exception $e) {
            
        }
}

?>