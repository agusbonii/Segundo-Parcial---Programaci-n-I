<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Publicación</title>
</head>
<body>
    <form action="/publicacion/modificar" method="post">
        ID: <input type="text" name="autor"><br>
        Autor: <input type="text" name="autor"><br>
        Fecha: <input type="datetime-local" name="fechaYHora"><br>
        Cuerpo: <input type="text" name="cuerpo"><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>