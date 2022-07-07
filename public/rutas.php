<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","index");
    Routes::AddView("/login","login");
    Routes::AddView("/settings","settings");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::Add("/logout","get","SesionControlador::CerrarSesion");
    
    Routes::AddView("/usuarios/alta","usuarios/alta");
    Routes::Add("/usuarios/alta","post","UsuarioControlador::Alta");

    Routes::AddView("/usuarios/modificacion","usuarios/modificacion");
    Routes::Add("/usuarios/modificacion","post","UsuarioControlador::modificacion");

    Routes::AddView("/usuarios/baja","usuarios/baja");
    Routes::Add("/usuarios/baja","post","UsuarioControlador::Baja");

    Routes::Run();

       