<?php
/**
 * @author Daniel Hernandez <dhernandez@dhwebdesignmx.com>
 * @see https://dhwebdesignmx.com
 * @copyright 2021 Daniel Hernández
 */
// incluyo el archivo de configuracion php - la conexion a la bd
include '../conn/config.inc21.php'; 
$conn = AbrirConexion(); // abro la conexion
$sql = "SELECT * FROM archivos"; // consulta para listar los cursos 
$resultado = mysqli_query($conn, $sql); // ejecuto la consulta y guardo resultados
// extraigo los resultados y los regreso como un array asociativo (en variable $archivos)
$archivos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>