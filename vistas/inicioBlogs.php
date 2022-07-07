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
    <?php 

    $sql = "SELECT * FROM publicaciones";
    $resultado = PostBlogControlador::ejcutarSentenciaDevuelveResultado($sql,1);

    if($resultado) foreach($resultado as $fila) :
    ?>
    <b>ID: </b>  <?=$fila['id']?> 
    <b>autor: </b>  <?=$fila['autor']?> 
    <b>Fecha y Hora de Publicacion: </b> <?=$fila['fechaYHora']?> <br>
    <?=$fila['cuerpo']?>

    <br />
    <?php endforeach; ?>
</body>
</html>