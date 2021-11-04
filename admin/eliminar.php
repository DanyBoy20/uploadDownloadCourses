<?php
session_start();
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
// SI LA SESION NO ESTA DEFINIDA/INICIALIZDA Y O VALIDA 
if ( !isset( $_SESSION[ 'cve' ] ) ) {
	session_destroy();
	session_unset();
	// LE NEGAMOS EL ACCESO (CON MENSAJE) Y LO REDIRECCIONAMOS A LA PAGINA PRINCIPAL DEL SITIO WEB
	echo '<script type="text/javascript">alert("ACCESO DENEGADO");window.location.href="../index.html";</script>';
}
include '../conn/config.inc21.php'; // LLAMO A MI ARCHIVO CONFIG
$conn = AbrirConexion(); // abro la conexion
$clave = $_POST[ "codigo" ]; // ASIGNO LA VARIABLE QUE VIENE DEL FORMULARIO ANTERIOR
$sentencia = "DELETE FROM archivos WHERE id=$clave"; // CREO LA SENTENCIA SQL PARA ELIMINAR
if($conn->query($sentencia) === true){ // SI SE EJECUTA CORRECTAMENTE
    echo '<script type="text/javascript">alert("CURSO ELIMINADO");</script>'; // MANDO MENSAJE
} else{ // SI NO SE EJECTUA LA SENTENCIA DE ELIMINACION
    echo '<script type="text/javascript">alert("OCURRIO UN ERROR, INTENTELO MAS TARDE");</script>'; // MANDO MENSAJE
}   
CerrarConexion( $conn ); // EN TODOS LOS CASOS CIERRO LA CONEXION
echo '<script type="text/javascript">window.location.href="index.php";</script>'; // Y REGRESO AL INICIO
?>