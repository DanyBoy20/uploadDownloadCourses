<?php
session_start();
include 'conn/config.inc21.php'; 
$mensaje = ""; // para almacenar el mensaje si no son los datos correctos
// como los datos son enviados dentro de la misma pagina, verificamos que la variable
// que recoge los datos ($_POST) no este vacia, si hay datos, procedemos a verificarlos
if ( ! empty( $_POST ) ) {
  // comprobamos si las variables recibidas del formulario han sido definidas
  if ( isset( $_POST['usuar'] ) && isset( $_POST['contras'] ) ) {
        $con = AbrirConexion(); // abrimos la conexion, y se la asignamos a la variable
    // preparamos (prepare) la sentencia ($sentencia) SQL de la conexion $con
    // el signo ? significa que usaremos parametros para evitar la inyeccion SQL
        $sentencia = $con->prepare("SELECT * FROM usuarios WHERE nombreU = ?");
    // creamos el parametro, la sintaxis de la funcion nos pide que tipo de parametro es
        $sentencia->bind_param('s', $_POST['usuar']); // con "s" indicamos que sera un string - cadena
        $sentencia->execute(); // ejecutamos la sentencia previa
        $resultado = $sentencia->get_result(); // asignamos el resultado
    // fetch_object regresa la fila actual de la consulta como un objeto
    // para que, con ese objeto, podamos acceder a sus propiedades, en nuestro caso
    // acceder a los valores de los campos de nuestra base de datos
      $usuario = $resultado->fetch_object(); // objeto de la fila actual de la consulta a $usuario
      // verificamos la contraseña, comparando el valor del formulario con el objeto
    // y su valor del campo (a traves de su nombre) de la base de datos 
      if ( password_verify( $_POST['contras'], $usuario->contra ) ) { // contra = nombre campo tabla
        $_SESSION['cve'] = $usuario->idusuario; // ID = nombre campo tabla
      }else { // si los datos son incorrectos
        $mensaje = "Datos incorrectos";
      } 
  // cerramos resutado y conexion
      $resultado->close(); 
      CerrarConexion($con);
    }
} 
// si la variable de sesion ha sido definida (linea 25) 
if (isset($_SESSION["cve"])){
  echo '<script type="text/javascript">alert("BIENVENIDO");window.location.href="admin/index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- ETIQUETAS META REQUERIDAS -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DH - CENTRO DE APRENDIZAJE EN LINEA</title>
  <!-- ARCHIVO CSS DE BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <section class="container-fluid fondo d-flex justify-content-left">
    <div class="container"><img src="img/LOGO-DH-HEAD-FOOT.svg" width="300" height="91" class="img-fluid" alt="Logo"></div>
  </section>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark colornv">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.html"><img src="img/LOGO_DH_BLANCO_NAV.svg" width="30" height="30" class="d-inline-block align-top" alt="logo">&nbsp;Cursos descargables online</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-4 ml-4 mt-2 mt-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-item nav-link" href="index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="cursos.php">Cursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="desarrolloweb.html">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link active" href="contacto.html">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-12"><H1 class="display-4 my-4 text-center">INICIAR SESIÓN</H1></div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="text-justify"><?php if($mensaje!="") { echo $mensaje; } ?></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <form name="contacto" method="post">
          <div class="form-group">
            <label for="" class="col-form-label d-none d-sm-block">Nombre:</label>
            <input type="text" name="usuar" class="form-control" placeholder="usuario" pattern="^(?=.*[a-zA-Z])(?=\w*[0-9])\w{6,10}" minlength="6" maxlength="10" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label d-none d-sm-block">Contraseña:</label>
            <input type="password" name="contras" class="form-control" placeholder="contraseña" autocomplete="off" required>
          </div>          
          <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
  <section class="container-fluid fondo d-flex justify-content-left mt-5">
    <div class="container">
      <div class="row">
        <div class="fondo col-sm-12 col-md-4">
          <h6 class="titulosfooter my-4">
            EMPRESA
          </h6> 
          <img src="img/LOGO_DH_ESCOLAR_FOOTER.png" class="img-fluid" alt="LOGO INICIO">
          <P class="text-justify">Somos una empresa dedicada a la enseñanza en línea, a través de cursos descargables totalmente gratuitos.</P>   
        </div>
        <div class="fondo col-sm-12 col-md-4 px-5">
          <h6 class="titulosfooter my-4">
            SITIOS RELEVANTES
          </h6>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a href="#" class="enlace">Enlace 1</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a href="#" class="enlace">Enlace 2</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a href="#" class="enlace">Enlace 3</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a href="#" class="enlace">Enlace 4</a></p>
        </div>
        <div class="fondo col-sm-12 col-md-4">
          <h6 class="titulosfooter my-4">
            MENU
          </h6>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a class="enlace" href="index.html">Inicio</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a class="enlace" href="cursos.php">Cursos</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a class="enlace" href="desarrolloweb.html">Servicios</a></p>
          <p></p>
          <p class="colorFuenteLink font-weight-light"><a class="enlace" href="contacto.html">Contacto</a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- ARCHIVOS JS DE BOOTSTRAP -->
  <script src="js/jquery-3.4.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>   
  <script src="js/bootstrap.min.js"></script>
</body>
</html>