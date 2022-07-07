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
    <form action="/publicacion/baja" method="post">
        <b>ID: </b>  <input type="text" name="id" value="<?=$fila -> Id?>">
        <b>Autor: </b>  <input type="text" name="autor" value="<?=$fila -> Autor?>">
        <b>Fecha y Hora de Publicacion: </b>  <input type="text" name="" value="<?=$fila -> fechaYHora?>"> <br>
        <textarea name="cuerpo"><?=$fila -> Cuerpo?><textarea/>
        <input type="text" name="" value=""><br>
        <input type="button" onclick="window.location='/publicacion/modificacion'" value="Modificar">
        <input type="submit" value="Borrar"><br>
    </form><br>

    <?php endforeach; ?>
</body>
</html>