<?php 
    require "../utils/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fabrica de Chacinados - Crear Usuario</h1>
    <form action="/usuarios/alta" method="post">
        Usuario <input type="text" name="usuario"> <br />
        Nombres <input type="text" name="nombres"> <br />
        Apellidos <input type="text" name="apellidos"> <br />
        Password <input type="password" name="password"> <br />
        <input type="submit" value="Crear usuario">
    </form>