<?php
session_start();
if ( !isset( $_SESSION[ 'cve' ] ) ) {
	session_destroy();
	session_unset();
	echo '<script type="text/javascript">alert("ACCESO DENEGADO");window.location.href="../index.html";</script>';
}
include 'procesos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- ETIQUETAS META REQUERIDAS -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DH - CENTRO DE APRENDIZAJE EN LINEA</title>
  <!-- ARCHIVO CSS DE BOOTSTRAP -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <section class="container-fluid fondo d-flex justify-content-left">
    <div class="container"><img src="../img/LOGO-DH-HEAD-FOOT.svg" width="300" height="91" class="img-fluid" alt="Logo"></div>
  </section>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark colornv">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="../img/LOGO_DH_BLANCO_NAV.svg" width="30" height="30" class="d-inline-block align-top" alt="logo">&nbsp;Cursos descargables online</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-4 ml-4 mt-2 mt-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-item nav-link active" href="#">Inicio Tablero</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="../uploads/subir.php">Cargar Cursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="logout.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-12"><H1 class="display-4 my-4 text-center">LISTA DE CURSOS EN SERVIDOR</H1></div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <img src="../img/secure.png" width="180" height="180" alt="logo login" class="img-fluid rounded mx-auto d-block" />
      </div>
      <div class="col-sm-12 col-md-6"> 
        <div class="table-responsive">
          <?php $contador = 0; ?>
          <table class="table my-4 mx-2">
            <thead>
              <th><p id="encabezadoparrafo">Item</p></th>
              <th><p id="encabezadoparrafo">Nombre</p></th>
              <th><p id="encabezadoparrafo">Tamaño (en mb)</p></th>
              <th><p id="encabezadoparrafo">Descargas</p></th>
              <th><p id="encabezadoparrafo">Acción</p></th>
            </thead>
            <tbody>
              <?php foreach ($archivos as $archivo): ?>
              <tr>
                <td><p><?php echo $archivo['id']; ?></p></td>
                <td><p><?php echo $archivo['nombre']; ?></p></td>
                <td><p><?php echo floor($archivo['tamanio'] / 1000) . ' KB'; ?></p></td>
                <td><p><?php echo $archivo['descargas']; ?></p></td>
                <td><p><?php echo '<form name="form' . ++$contador . '" method="post" action="eliminar.php">
                <input type="hidden" name="codigo" value="' . $archivo[ "id" ] . '">
                <input type="submit" value="Eliminar"></form>'; ?></p></td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
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
          <img src="../img/LOGO_DH_ESCOLAR_FOOTER.png" class="img-fluid" alt="LOGO INICIO">
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
  <script src="../js/jquery-3.4.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>   
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>