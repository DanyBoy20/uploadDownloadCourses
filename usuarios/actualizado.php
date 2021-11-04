<?php
session_start();
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
if ( !isset( $_SESSION[ 'identificador' ] ) ) {
	session_unset();
	session_destroy();	
	echo '<script type="text/javascript">alert("ACCESO DENEGADO");window.location.href="../index.html";</script>';
}
// SI EXISTE SESION, SI EXISTEN VARIABLES DEL FORMULARIO
include('../conn/config.inc21.php'); // INCLUIMOS EL ARCHIVO DE CONEXION
// RECUPERAMOS VARIABLES DEL FORMULARIO
$ident = $_SESSION[ 'identificador' ];
$contrasenia = password_hash($_POST['contras'], PASSWORD_DEFAULT); // encriptamos la nueva contraseña
$conexion = AbrirConexion(); // RECUPERAMOS LA CONEXION
// CREAMOS LA SENTENCIA DE LA ACTUALIZACION
//preparamos la sentencia SQL
$sentencia = $conexion->prepare( "UPDATE clientes SET contra='" . $contrasenia . "' WHERE idcliente='" . $ident . "'" );
$sentencia->execute(); // EJECUTAMOS LA SENTENCIA
CerrarConexion( $conexion ); // CERRAMOS LA CONEXION
$sentencia->close(); // LIMPIAMOS LA VARIABLE DE LA SENTENCIA Y MANDAMOS MENSAJE Y REDIRECCION
echo '<script type="text/javascript">alert("CONTRASEÑA ACTUALIZADA");</script>'; // mensaje de exito
session_unset(); 
session_destroy(); // destruimos sesion
// y redireccionamos a pagina principal, para que vuelva a entrar
echo '<script type="text/javascript">alert("DEBERA INICIAR SESION NUEVAMENTE");window.location.href="../iniciar.php";</script>';
