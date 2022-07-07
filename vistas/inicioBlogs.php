<?php 
    require "../utils/autoload.php";

    /*if(isset($_SESSION['autenticado'])){
        echo "Bienvenido " . $_SESSION['nombreUsuario'];
        echo "<br /><a href='/cerrarSesion'>Salir</a>";
    }
    else 
        header("Location: /login");*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <a href="/publicacion/alta">Agregar Publicación</a><br><br>
    <?php 

    $resultado = PostBlogControlador::BuscarTodos();
    
    
    if($resultado) foreach($resultado as $fila) :
    ?>
    <b>ID: </b>  <?=$fila -> Id?> 
    <b>Autor: </b>  <?=$fila -> Autor?> 
    <b>Fecha y Hora de Publicacion: </b> <?=$fila -> FechaYHora?> <br>
    <?=$fila -> Cuerpo?>

    <br>
    <a href="/publicacion/modificacion">Modificar</a>
    <a href="/publicacion/baja">Borrar</a>
    <br>
    <?php endforeach; ?>
</body>
</html>