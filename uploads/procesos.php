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
/* ****SUBIR ARCHIVOS**** */
if (isset($_POST['guardar'])) { // si boton de guardar esta definido (si se presiono)
    // nombre del archivo subido
    $nombrearchivo = $_FILES['curso']['name'];
    // carpeta de destino para el archivo
    $destino = 'docs/' . $nombrearchivo; 
    // extraemos la extenxion del archivo
    $extension = pathinfo($nombrearchivo, PATHINFO_EXTENSION);
    // ponemos el archivo temporalmente en una carpeta
    $archivo = $_FILES['curso']['tmp_name'];
    $tamanio = $_FILES['curso']['size'];
    // validamos que sea la extencion correcta mediante un arreglo con el tipo de extensiones
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script type="text/javascript">alert("LA EXTENSION DE TU ARCHIVO NO ES: ZIP, PDF O DOCX");</script>';
    } elseif ($_FILES['curso']['size'] > 1000000) { // el archivo no debe superar 1 mb
        echo '<script type="text/javascript">alert("ARCHIVO DEMASIADO GRANDE");</script>';
    } else {
        // movemos el archivo de su ubicacion temporal al directoro de destino (uploads)
        if (move_uploaded_file($archivo, $destino)) { // si fue exitoso mover el archivo a su carpeta de destino
            // entonces insertamos los datos en la tabla archivos de la BD
            $sql = "INSERT INTO archivos (nombre, tamanio, descargas) VALUES ('$nombrearchivo', $tamanio, 0)";
            if (mysqli_query($conn, $sql)) { // si la insercion en la tabla fue exitosa
                echo '<script type="text/javascript">alert("CURSO CARGADO EN SERVIDOR");</script>'; // mandamos mensaje exitoso
            }
        } else { // sino
            echo '<script type="text/javascript">alert("NO SE PUDO CARGAR");</script>'; // mandamos mensaje de error
        }
    }
    CerrarConexion( $conn );
    echo "<meta http-equiv='refresh' content='0'>"; // refrescamos la pagina para cargar el listado de archivos
}
/* *****DESCARGAS DE ARCHIVOS*****  */
// verificamos que la variable este definida (que si recibimos datos y/o que existe la variable)
ob_start();
if (isset($_GET['cvearchivo'])) {
    $id = $_GET['cvearchivo']; // el valor recogido lo asignamos a variable
    // estraemos (consultamos) de la BD el archivo que va a ser descargado a traves de la sentencia SQL
    $sql = "SELECT * FROM archivos WHERE id=$id";
    $resultado = mysqli_query($conn, $sql); // ejecutamos la consulta
    $archivo = mysqli_fetch_assoc($resultado); // recuperamos el resultado en un array asociativo y lo asignamos a variable
    $rutaarchivo = 'docs/' . $archivo['nombre']; // asignamos la ruta del archivo
    if (file_exists($rutaarchivo)) { // si el archivo existe
    // procedemos a configurar cabeceras necesarias y finalmente respondemos con el archivo al usuario usando la función readFile ()
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($rutaarchivo) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('docs/' . $archivo['nombre']));
        ob_clean();
        flush(); 
        readfile('docs/' . $archivo['nombre']); 
        $incrementa = $archivo['descargas'] + 1;
        $actualizar = "UPDATE archivos SET descargas=$incrementa WHERE id=$id";
        mysqli_query($conn, $actualizar);
        CerrarConexion( $conn );
        exit;
    }
}
?>