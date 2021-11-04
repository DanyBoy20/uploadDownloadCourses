<?php    
include '../../conn/config.inc21.php'; 
$conexion = AbrirConexion();
/* INSERTAR USUARIOS */
$sentencia = $conexion->prepare( 'INSERT INTO usuarios (nombreU, contra) VALUES (?, ?)' );
$nombre = $_POST[ 'usuar' ];
$contrasenia = password_hash($_POST['contras'], PASSWORD_DEFAULT);
$sentencia->bind_param( 'ss', $nombre, $contrasenia );
$sentencia->execute();
$sentencia->close();
CerrarConexion( $conexion );
echo '<script type="text/javascript">alert("REGISTRO EXITOSO, PUEDE INICIAR SESION");window.location.href="acceso.php";</script>';
?>