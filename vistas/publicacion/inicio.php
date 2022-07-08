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
    <form action="/publicacion/buscar" method="post">
        Buscar autor: <input type="text" name="autor">
        <input type="submit" value="Buscar">
    </form><br><br>
    <a href="/publicacion/alta">Agregar Publicación</a><br><br>
    <?php 
    
    $resultado = PostBlogControlador::BuscarTodos();
    
    
    if($resultado) foreach($resultado as $fila) :
    ?>
    <form action="/publicacion/baja" method="post">
        <b>ID: </b>  <input type="text" name="id" value="<?=$fila -> Id?>"><br>
        <b>Autor: </b>  <input type="text" name="autor" value="<?=$fila -> Autor?>"><br>
        <b>Fecha y Hora de Publicacion: </b>  <input type="datetime" name="" value="<?=$fila -> fechaYHora?>"> <br>
        <b>Cuerpo: </b>  <input type="text" name="cuerpo" value="<?=$fila -> Cuerpo?>"><br>
        <input type="button" onclick="window.location='/publicacion/modificacion'" value="Modificar">
        <input type="submit" value="Borrar"><br>
    </form><br>

    <?php endforeach; ?>
</body>
</html>