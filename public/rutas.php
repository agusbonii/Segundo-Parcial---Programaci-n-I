<?php 
    require "../utils/autoload.php";

    Routes::AddView("/login","login");
    Routes::AddView("/","login");
    Routes::AddView("/inicio","publicacion/inicio");
    Routes::AddView("/publicacion/alta","publicacion/alta");
    Routes::AddView("/publicacion/modificacion","publicacion/modificar");

    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/publicacion/alta","post","PostBlogControlador::Alta");
    Routes::Add("/publicacion/baja","post","PostBlogControlador::Baja");
    Routes::Add("/publicacion/modificacion","post","PostBlogControlador::Modificacion");

    Routes::Run();

       