<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /");
        
    $Seccion="Ajustes";
    require "../vistas/generic.php";
?>
    <a href="/usuarios/modificacion">Modificar perfil</a>
    <a href="/usuarios/baja">Darse de baja</a>