<?php 
    require "../utils/autoload.php";

    Routes::AddView("/login","login");
    Routes::AddView("/","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::AddView("/inicio","inicioBlogs");

    Routes::Run();

       