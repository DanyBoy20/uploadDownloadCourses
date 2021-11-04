<?php    
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
include 'conn/config.inc21.php'; 
$conexion = AbrirConexion();
$sentencia = $conexion->prepare( 'INSERT INTO clientes (nombreC, email, contra) VALUES (?, ?, ?)' );
$sentencia->bind_param( 'sss', $nombre, $correo, $contrasenia );
$nombre = $_POST[ 'usuar' ];
$correo = $_POST[ 'correo' ];
$contrasenia = $_POST[ 'contras' ];
$contrasenia = password_hash($_POST['contras'], PASSWORD_DEFAULT);
$sentencia->execute();
$sentencia->close();
CerrarConexion( $conexion );
echo '<script type="text/javascript">alert("REGISTRO EXITOSO, PUEDE INICIAR SESION");window.location.href="iniciar.php";</script>';
