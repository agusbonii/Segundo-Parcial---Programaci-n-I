<?php
    require "../utils/autoload.php";
    
    if(!isset($_SESSION['autenticado'])) header("Location: /login");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Publicación</title>
</head>
<body>
    <form action="/publicacion/alta" method="post">
        Autor: <?=$_SESSION['nombreUsuario']?><br>
        Fecha: <input type="datetime-local" name="fechaYHora" value=<?=date('Y-m-d\TH:i:s', time())?>><br>
        Cuerpo: <input type="text" name="cuerpo"><br>
        <input type="submit" value="Agregar">
    </form>

    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">No se pudo hacer dicha operación.</div>
    <?php endif;?>
</body>
</html>