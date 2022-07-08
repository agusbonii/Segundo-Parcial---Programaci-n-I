<?php 
    require "../utils/autoload.php";
    $Seccion="Foro";
    require "../vistas/generic.php";
?>
    <a href="/">Inicio</a>
    <?php if (isset($_SESSION['autenticado'])) :?>
        <a href="/settings">Configurar</a>
        <a href="/logout">Cerrar Sesion</a> <br /><br />
    <?php endif; ?>
    <?php if (!isset($_SESSION['autenticado'])) :?>
        <a href="/login">Iniciar Sesion</a> <br /><br />
    <?php endif; ?>