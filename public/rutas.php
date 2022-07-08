<?php 
    require "../utils/autoload.php";
        
    Routes::AddView("/login","login");
    Routes::AddView("/","login");
    Routes::AddView("/settings","settings");
    Routes::AddView("/usuarios/alta","usuarios/alta");
    Routes::AddView("/usuarios/modificacion","usuarios/modificacion");
    Routes::AddView("/usuarios/baja","usuarios/baja");
    Routes::AddView("/inicio","publicacion/inicio");
    Routes::AddView("/publicacion/alta","publicacion/alta");
    Routes::AddView("/publicacion/mispublicaciones","publicacion/misPublicaciones");

    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/usuarios/alta","post","UsuarioControlador::Alta");
    Routes::Add("/usuarios/modificacion","post","UsuarioControlador::modificacion");
    Routes::Add("/usuarios/baja","post","UsuarioControlador::Baja");
    Routes::Add("/publicacion/alta","post","PostBlogControlador::Alta");
    Routes::Add("/publicacion/baja?id=" . $_GET["id"] ,"get","PostBlogControlador::Baja");
    Routes::Add("/publicacion/modificacion","post","PostBlogControlador::Modificacion");
    Routes::Add("/logout","get","SesionControlador::CerrarSesion");

    Routes::Run();

       
