<?php 
    require "../utils/autoload.php";

    class UsuarioControlador {
        public static function Alta($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> NombreCompleto = $context['post']['nombreCompleto'];
            $u -> Password = $context['post']['password'];
            
            return self::validarGuardado($u,"alta");
        }

        public static function Modificacion($context){
            $u = new UsuarioModelo();
            $u -> Id = $_SESSION["userID"];
            $u -> Nombre = $_SESSION['nombreUsuario'];
            $u -> NombreCompleto = $context['post']['nombreCompleto'];
            $u -> Password = $context['post']['password'];

            if ($u -> Autenticar($u -> Nombre, $u -> Password)){
                return self::validarGuardado($u,"modificacion");
            }
            return render("usuarios/modificacion",["error" => true]);
        }

        private function validarGuardado($usuario, $vista){
            if($usuario -> Guardar()) return render("usuarios/$vista",["error" => false]);
            else return render("usuarios/$vista",["error" => true]);
        }

        public static function Baja($context){
            $u = new UsuarioModelo();
            $u -> Id = $_SESSION["userID"];
            $u -> Usuario = $_SESSION["nombreUsuario"];
            if ($u -> Eliminar()) header("Location: /logout");
            else render("usuarios/baja",["error" => true]);
        }

        public static function Obtener(){
            $u = new UsuarioModelo();
            $u -> Id = $_SESSION["userID"];
            $resultado = $u -> Obtener();
            return $resultado;
        }
    }

