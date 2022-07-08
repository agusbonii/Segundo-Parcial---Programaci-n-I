<?php 
require "../utils/autoload.php";

class PostBlogControlador {
    public static function Alta($context){
        $publicacion = new PostBlogModelo();
        $publicacion -> Autor = $context['post']['autor'];
        $publicacion -> FechaYHora = $context['post']['fechaYHora'];
        $publicacion -> Cuerpo = $context['post']['cuerpo'];
        $publicacion -> Guardar();
        return renderVista("publicacion/inicio");
    }

    public static function Baja($context){
        $publicacion = new PostBlogModelo();
        $publicacion -> Id = $context['get']['id'];
        $publicacion -> Eliminar();
        return renderVista("publicacion/inicio");
    }

    public static function Modificacion($context){
        $publicacion = new PostBlogModelo();
        $publicacion -> Id = $context['post']['id'];
        $publicacion -> Autor = $context['post']['autor'];
        $publicacion -> FechaYHora = $context['post']['fechaYHora'];
        $publicacion -> Cuerpo = $context['post']['cuerpo'];
        $publicacion -> Guardar();
        return renderVista("publicacion/inicio");
    }

    public static function BuscarUno($context){
        $publicacion = new PostBlogModelo();
        $publicacion -> Id = $context['post']['id'];
        $publicacion -> Autor = $context['post']['autor'];
        $publicacion -> FechaYHora = $context['post']['fechaYHora'];
        $publicacion -> Cuerpo = $context['post']['cuerpo'];
        $publicacion -> Obtener();
    }

    public static function BuscarTodos(){
        $publicacion = new PostBlogModelo();
        $resultado = $publicacion -> obtenerTodos();
        return $resultado;
    }
}

