<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","login");
    Routes::AddView("/login","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::AddView("/usuarios/alta","usuarios/alta");
    Routes::Run();

       