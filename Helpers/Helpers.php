<?php
function base_url()
{
    return BASE_URL;
}
function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}
function permisos($data="")
{
    $VistaPe = "Views/Errors/Permisos.php";
    require_once($VistaPe);
}
function links($data="")
{
    $VistaL = "Views/Template/links.php";
    require_once($VistaL);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}
function referencias($data="")
{
    $VistaP = "Views/Template/referencias.php";
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

?>