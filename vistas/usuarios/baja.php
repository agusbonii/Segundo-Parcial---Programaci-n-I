<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /");
    if(isset($_SESSION['autenticado']))
    header('Location: /login');  
?>