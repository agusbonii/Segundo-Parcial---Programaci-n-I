<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /inicio");
    
    if(!isset($_SESSION['nombreUsuario']))
        header('Location: /login');

    $Seccion="Modificar Perfil";
    
    require "../vistas/generic.php";
    $resultado = UsuarioControlador::Obtener();
    if (!isset($resultado)) header("Location: /logout");
    
?>
    <form action="/usuarios/modificacion" method="post">
        Usuario <input type="text" name="usuario" value=<?=$resultado['Nombre']?> readonly> <br />
        Nombre Completo <input type="text" name="nombreCompleto" value="<?=$resultado['NombreCompleto']?>" require> <br />
        Password <input type="password" name="password" require> <br />
        <input type="submit" value="Modificar Sesión">
    </form>
    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">Ocurrió un problema al modificar tus datos.</div>
    <?php endif;?>
    <?php if(isset($parametros['error']) && $parametros['error'] === false ) :?>
        <div style="color: green;">Se modificaron correctamente tus datos!.</div>
    <?php endif;?>