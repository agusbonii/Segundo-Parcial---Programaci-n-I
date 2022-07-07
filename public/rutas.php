<?php 
    require "../utils/autoload.php";

    Routes::AddView("/login","login");
    Routes::AddView("/","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::AddView("/inicio","inicioBlogs");
    Routes::AddView("/publicacion/alta","altaPublicacion");
    Routes::Add("/publicacion/alta","post","PostBlogControlador::Alta");
    Routes::Add("/publicacion/baja","post","PostBlogControlador::Baja");
    Routes::Add("/publicacion/modificacion","post","PostBlogControlador::Modificacion");

    Routes::Run();

       