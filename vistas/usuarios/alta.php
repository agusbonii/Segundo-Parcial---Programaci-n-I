<?php 
    require "../utils/autoload.php";
    if(isset($_SESSION['autenticado']))
        header("Location: /inicio");

    $Seccion="Crear Usuario";
    require "../vistas/generic.php";
?>
    <form action="/usuarios/alta" method="post">
        Usuario <input type="text" name="usuario" required> <br />
        Nombres <input type="text" name="nombres" required> <br />
        Apellidos <input type="text" name="apellidos" required> <br />
        Password <input type="password" name="password" required> <br />
        <input type="submit" value="Crear usuario">
    </form>
    
    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">El usuario ya existe.</div>
    <?php endif;?>
    <?php if(isset($parametros['error']) && $parametros['error'] === false ) :?>
        <div style="color: green;">Se ingreso el usuario correctamente.</div>
    <?php endif;?>