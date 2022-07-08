<?php 
    require "../utils/autoload.php";
    $REQUEST_URI=($_SERVER["REQUEST_URI"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabrica de Chacinados - <?= $Seccion ?></title>
</head>
<body>
    <h1>Fabrica de Chacinados - <?= $Seccion ?></h1>
    <a href="/inicio">Inicio</a>
    <?php if (isset($_SESSION["nombreUsuario"])) : ?>
        <a href="/publicacion/mispublicaciones">Mis Publicaciones</a>
        <a href="/publicacion/alta">Agregar Publicación</a>
        <a href="/usuarios/modificacion">Modificar perfil</a>
        <a href="/usuarios/baja">Darse de baja</a>
        <a href="/logout">Cerrar Sesion</a>
    <?php endif; ?>
    <?php if (!isset($_SESSION["nombreUsuario"])) : ?>
        <a href="/login">Iniciar Sesion</a>
    <?php endif; ?>

    <br />