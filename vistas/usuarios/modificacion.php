<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /");

    $Seccion="Modificar Perfil";
    require "../vistas/generic.php";
?>
    <a href="/">Inicio</a>
    <form action="/usuarios/modificacion" method="post">
        Usuario <input type="text" name="usuario" value=<?=$_SESSION['nombreUsuario']?> readonly> <br />
        Nombres <input type="text" name="nombres" require> <br />
        Apellidos <input type="text" name="apellidos" require> <br />
        Password <input type="password" name="password" require> <br />
        <input type="submit" value="Modificar Sesión">
    </form>

    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">Ocurrió un problema al modificar tus datos.</div>
    <?php endif;?>
    <?php if(isset($parametros['error']) && $parametros['error'] === false ) :?>
        <div style="color: green;">Se modificaron correctamente tus datos!.</div>
    <?php endif;?>