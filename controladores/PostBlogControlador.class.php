<?php 
require "../utils/autoload.php";

class PostBlogControlador {
    public static function Alta($context){
        $publicacion = new PostBlogModelo();
        $publicacion -> Nombre = $context['post']['usuario'];
        $publicacion -> Password = $context['post']['password'];
        $publicacion -> Guardar();
    }
}

