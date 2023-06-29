<?php
    class Iniciar extends Controllers
    {

    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {        
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];            
            $hash = hash("SHA256", $clave);            
            $data = $this->model->selectUsuario($usuario, $hash);
            
            if (!empty($data)) {
                session_start();
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];
                    if ($_SESSION['rol'] == 7) {  $_SESSION['nrol'] = "Administrador"; }
                    elseif ($_SESSION['rol'] == 6) {  $_SESSION['nrol'] = "Operador"; }  
                    elseif ($_SESSION['rol'] == 5) {  $_SESSION['nrol'] = "Jefatura"; } 
                    elseif ($_SESSION['rol'] == 4) {  $_SESSION['nrol'] = "Abogado Abasto"; } 
                    elseif ($_SESSION['rol'] == 3) {  $_SESSION['nrol'] = "Abojado Juridico"; } 
                    elseif ($_SESSION['rol'] == 2) {  $_SESSION['nrol'] = "Requiriente"; } 
                    elseif ($_SESSION['rol'] == 1) {  $_SESSION['nrol'] = "Almacen"; }
                    $_SESSION['perfil'] = $data['perfil'];
                    $_SESSION['telefono'] = $data['telefono'];
                    $_SESSION['activo'] = true;
                    
                    //$fecha_elimina = $_POST['fecha_elimina'];                
                    header('location: '.base_url(). 'Inicio/Home');
            } else {
                $error = 0;
                header("location: ".base_url(). 'Login'."?msg=$error");
            }

        }

    }

    }
?>
