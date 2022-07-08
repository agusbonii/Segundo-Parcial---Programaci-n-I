<?php 
    require "../utils/autoload.php";
    
    if(isset($_SESSION['autenticado'])) $Seccion = "Inicio (" . $_SESSION['nombreUsuario'] . ")";
    else header("Location: /login");
    
    require "../vistas/generic.php";
    
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