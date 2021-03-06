<?php
session_start();
if ( !isset( $_SESSION[ 'identificador' ] ) ) {
	session_destroy();
	session_unset();
	echo '<script type="text/javascript">alert("ACCESO DENEGADO");window.location.href="../index.html";</script>';
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
            <a class="nav-item nav-link active" href="index.php">Inicio Tablero</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="#">Cambiar Contraseña</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="../uploads/descargar.php">Descargar Cursos</a>
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
      <div class="col-sm-12"><H1 class="display-4 my-4 text-center">CAMBIAR CONTRASEÑA</H1></div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <img src="../img/secure.png" width="180" height="180" alt="logo login" class="img-fluid rounded mx-auto my-4 d-block" />
      </div>
      <div class="col-sm-12 col-md-6">   

        <form name="contacto" method="post" action="actualizado.php">
          <div class="form-group">
            <label for="" class="col-form-label d-none d-sm-block">Nueva contraseña:</label>
            <input type="password" name="contras" class="form-control" placeholder="Contraseña de 6-8 caracteres (numeros y letras)" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Aceptar" class="btn btn-success">
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