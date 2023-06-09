<?php
class Usuarios extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de usuarios
    public function Listar()
    {
        $data1 = $this->model->selectUsuarios();
        $this->views->getView($this, "Listar", "", $data1);
    }

    //Añade un nuevo usuario
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $clave = $usuario; //Por defecto de pone número de usuario
        $rol = $_POST['rol'];
        $hash = hash("SHA256", $clave);
        $insert = $this->model->insertarUsuarios($nombre, $usuario, $hash, $rol, $correo, $telefono);
        if ($insert == 'existe') {
            $data1 = $this->model->editarUsuariosC($correo);
            if ($data1['estado'] == 2) {
                $estado = 1;
                $id = $data1['id'];
                $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $rol, $id, $correo, $telefono);
                $cambio =$this->model->cambiarContra($hash, $id);
                $eliminar = $this->model->eliminarUsuarios($id, $estado);
                    if ($actualizar == 1) {
                        $alert = 'registrado';
                    } else {
                        $alert =  'error';
                    }
            } else {
                $alert = 'existe';
            }
        } else if ($insert > 0) {
            $alert = 'registrado';
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectUsuarios(); 
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();   
    }

    //Seleciona los datos de un Usuario
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarUsuarios($id);
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1);
        }
    }

    //Actualiza los datos de un Usuario
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $rol = $_POST['rol'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $rol, $id, $correo, $telefono);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de un Usuario
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->eliminarUsuarios($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectUsuarios();
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }

    //elimina un usuario (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->eliminarUsuarios($id, $estado);
        $data = $this->model->selectUsuarios();
        $alert =  'eliminado';
        $data1 = $this->model->selectUsuarios(); 
        header("location: " . base_url() . "Usuarios/eliminados?msg=$alert");
        die();
    }

    //Consulta los usuarios inactivos
    public function eliminados()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);      
    }

    //Reactiva los datos de un Usuario
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarUsuarios($id);
        $this->model->selectUsuarios();
        $data1 = $this->model->selectUsuarios(); 
        header('location: ' . base_url() . "Usuarios/eliminados?msg=$alert");
        die();
    }

    //Iniciar sesión
    public function login()
    {        
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];            
            $hash = hash("SHA256", $clave);            
            $data = $this->model->selectUsuario($usuario, $hash);
            
            if (!empty($data)) {
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
        $fecha_elimina = $_POST['fecha_elimina'];
        $dato=$this->model->eliminarContratos($fecha_elimina);
        $dato1=$this->model->eliminarContratos1($fecha_elimina);
        $dato2=$this->model->eliminarContratos2($fecha_elimina);
    }

    //Cambiar contraseña
    public function cambiar()
    {
        $hash = hash("SHA256", $_POST['actual']);
        $nuevahash = hash("SHA256", $_POST['nueva']);
        $nueva = $_POST['nueva'];
        $confirmar = $_POST['confirmar'];
        if ($nueva == $confirmar) {
            $data = $this->model->verificarPass($hash, $_SESSION['id']);
            if ($data != null) {
                $this->model->cambiarContra($nuevahash, $_SESSION['id']);
                $alert =  'cambio';
            }  else{
                $alert =  'error';
            }
        } else {
            $alert =  'noigual';
        }
        header('location: ' . base_url() . "Inicio/Home?msg=$alert");  
    }

    //Cambiar Imagen Perfil
    public function cambiarpic()
    {
        $usuario = $this->model->editarUsuarios($_SESSION['id']);
        $imgactual = $usuario['perfil'];
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES["archivo"]["name"];
        $nombre_nuevo = $_SESSION['id'].".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "png" || $name["extension"] == "jpg" || $name["extension"] == "jpeg")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                if($imgactual != "user.png"){
                    unlink("Assets/img/users/".$imgactual);
                }
                $ruta_destino = "Assets/img/users/".$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                    $id = $_SESSION['id'];
                    $this->model->img($nombre_nuevo, $id);
                    $alert =  'imagen';
                } else {
                    $alert =  'noimagen';
                }
            } else {
            $alert =  'noimagen';
            }
        } else {
            $alert =  'noimagen';
        }
        header('location: ' . base_url() . "Inicio/Home?msg=$alert");
        die();
    }

    //Cerrar Sesión
    public function salir()
    {
        session_destroy();
        header("Location: ".base_url());
    }
}
?>