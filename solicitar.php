<?php    
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
$para = 'correoservidor@dominio.com';
$as = $_POST['asunto'];
$saltolinea = "\r\n";
$mensaje = 'Mensaje de: ' . $_POST['nombre'] . $saltolinea .  $_POST['mensaje'] . $saltolinea .  $_POST['email'];
$encabezados = 'From: ' . $para;
mail($para,$as,$mensaje,$encabezados);
echo '<script type="text/javascript">alert("SOLICITUD DE INFORMACIÓN ENVIADA");window.location.href="index.html";</script>';
