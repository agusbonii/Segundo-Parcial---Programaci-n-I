<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /");

    $Seccion="Modificar Perfil";
    require "../vistas/generic.php";
?>
    <form action="/usuarios/modificacion" method="post">
        Usuario <input type="text" name="usuario"> <br />
        Nombres <input type="text" name="nombres"> <br />
        Apellidos <input type="text" name="apellidos"> <br />
        Password <input type="password" name="password"> <br />
        <input type="submit" value="Iniciar Sesión">
    </form>