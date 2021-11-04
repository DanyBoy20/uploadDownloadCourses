<?php
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
// FUNCION PARA CONECTARME A LA BD 
function AbrirConexion() { // funcion que regresa la conexion
	$servidor = "localhost"; // servidor
	$usuario = "root"; // usuario
	$contra = "123456789"; // contraseña
	$nombredb = "gestorcursos12"; // base de datos
	$conexion = new mysqli($servidor, $usuario, $contra, $nombredb)or die("Error en la conexion: %s\n" . $conexion->error);
	return $conexion; // regreso la conexion
}
// FUNCION PARA CERRAR LA CONEXIÓN
function CerrarConexion( $conexion ) { // funcion que cierra la conexion pasada por parametro
	$conexion->close();
} 
?>