<?php 
    require "../utils/autoload.php";

    class UsuarioControlador {
        public static function Alta($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> NombreCompleto = $context['post']['nombres']. " " .$context['post']['apellidos'];
            $u -> Password = $context['post']['password'];
            $u -> Guardar();
        }

        public static function Modificacion($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> NombreCompleto = $context['post']['nombres']. " " .$context['post']['apellidos'];
            $u -> Password = $context['post']['password'];
            $u -> Guardar();
        }

        public static function Baja($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> NombreCompleto = $context['post']['nombres']. " " .$context['post']['apellidos'];
            $u -> Password = $context['post']['password'];
            $u -> Eliminar();
        }
    }

