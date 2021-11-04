<?php
// PRIMERO RECUPERAMOS LA SESION VALIDA PARA PODER SABER CUAL ES LA QUE SE VA A ELIMINAR
session_start(); 
session_destroy();
session_unset();
// MANDAMOS MENSAJES Y REDIRECCIONAMOS
echo '<script type="text/javascript">alert("SESION CORRECTAMENTE CERRADA");window.location.href="../index.html";</script>';
?>