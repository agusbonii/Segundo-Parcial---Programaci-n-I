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
    <title>Publicaciones</title>
</head>
<body>
    <?php 
    
    $resultado = PostBlogControlador::BuscarPublicacionAutores();
    
    
    if($resultado) foreach($resultado as $fila) :
    ?>

    <form action="/publicacion/modificacion" method="post">
        <b>ID: </b>  <input type="text" name="id" value="<?=$fila -> Id?>"><br>
        <b>Autor: </b>  <input type="text" name="autor" value="<?=$fila -> Autor?>"><br>
        <b>Fecha y Hora de Publicacion: </b>  <input type="datetime-local" name="fechaYHora" value="<?=$fila -> FechaYHora?>"> <br>
        <b>Cuerpo: </b>  <input type="text" name="cuerpo" value="<?=$fila -> Cuerpo?>"><br>
        <input type="button" onclick="window.location='/publicacion/baja?id=<?=$fila -> Id?>'" value="Borrar">
        <input type="submit" value="Modificar"><br>
    </form><br>

    <?php 
    endforeach; else echo "<b>No hay ningúna publicación hecha por usted</b>"; 
    ?>

</body>
</html>