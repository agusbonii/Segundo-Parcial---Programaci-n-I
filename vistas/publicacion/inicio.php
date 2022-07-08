<?php 
    require "../utils/autoload.php";

    if(isset($_SESSION['autenticado'])){
        echo "Bienvenido " . $_SESSION['nombreUsuario'];
        echo "<br /><a href='/logout'>Salir</a><br><br>";
    }
    else 
        header("Location: /login");
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
    <a href="/publicacion/mispublicaciones">Mis Publicaciones</a><br>
    <a href="/publicacion/alta">Agregar Publicación</a><br><br>
    <?php 
    
    $resultado = PostBlogControlador::BuscarTodos();
    
    
    if($resultado) foreach($resultado as $fila) :
    ?>

    <b>ID: </b>  <?=$fila -> Id?><br>
    <b>Autor: </b>  <?=$fila -> Autor?><br>
    <b>Fecha y Hora de Publicacion: </b>  <?=$fila -> FechaYHora?><br>
    <b>Cuerpo: </b>  <?=$fila -> Cuerpo?><br><br>

    <?php endforeach; ?>

</body>
</html>