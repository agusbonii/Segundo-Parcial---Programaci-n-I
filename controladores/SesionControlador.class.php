<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> Password = $context['post']['password'];
            if($u -> Autenticar($u -> Nombre, $u -> Password)){
                SessionCreate("autenticado",true);
                SessionCreate("userID", $u -> ObtenerID($u -> Nombre));
                SessionCreate("nombreUsuario", $u -> Nombre);
                header("Location: /inicio");

            }
            render("login",["error" => true]);
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location: /login");
        }

       
    }

