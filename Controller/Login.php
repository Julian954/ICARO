<?php
    class Login extends Controllers
    {
        public function __construct()
        {
         session_start();
         if (!empty($_SESSION['activo'])) 
            {
                header("location: " . base_url()."Inicio/Home");
            }
            parent::__construct();
        }

        public function Login()
        {
            $this->views->getView($this, "login");
        }

        public function Reset()
        {
            $this->views->getView($this, "reset");
        }

    }
?>