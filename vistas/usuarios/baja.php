<?php 
    require "../utils/autoload.php";
    if(!isset($_SESSION['autenticado']))
        header("Location: /inicio");
    
    if(!isset($_SESSION['nombreUsuario']))
        header('Location: /login');
    
    
?>
    <script language="JavaScript">
        function confirmar(){
            if (confirm('¿Estas seguro de enviar este formulario?')){
                document.baja.submit()
            }
        }
    </script>
    <form name="baja" action="/usuarios/baja" method="post">
        <input type="button" onclick="confirmar()" value="Darse de baja">
    </form>

    <?php if(isset($parametros['error']) && $parametros['error'] === true ) :?>
        <div style="color: red;">Ocurrió un problema al eliminar tu usuario.</div>
    <?php endif;?>
    <?php if(isset($parametros['error']) && $parametros['error'] === false ) header("Location: /login");?>