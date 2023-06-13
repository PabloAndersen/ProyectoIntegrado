<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Andersub</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    
<div class="container  text-white rounded bg-light">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-12 d-flex justify-content-end align-items-center">
          <?php
                                if (isset($_SESSION["usuario"])) {
                                    if (isset($_SESSION["esAdmin"])) {
                                        print "<a href='./funcionesAdmin.php' id='boton' class='btn btn-sm btn-outline-secondary'>Funciones Admin</a>";
                                    }else{
                                        print "<a href='./cerrarSesion.php' id='boton' class='btn btn-sm btn-outline-secondary'>Cerrar sesión ".$_SESSION["usuario"]."</a>";
                                    }
                                    
                                }else{
                                    print "<a href='./iniciarSesion.php' id='boton' class='btn btn-sm btn-outline-secondary'>Iniciar Sesión</a>";
                                }
                                ?>
        
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2" >
    <nav class="nav d-flex justify-content-between" >
      <a class="p-2 link-secondary" href="#listatrabajadores">Lista trabajadores</a>
      <a class="p-2 link-secondary" href="productos.php">Tienda</a>
      <a class="p-2 link-secondary" href="clases.php">Clases</a>
      <a class="p-2 link-secondary" href="#redesSociales">Redes Sociales</a>
    </nav>
  </div>
</div>
<div class="logo">
  <a class="align-left" href="#tierentrenadores"><img src="images/Andersub.jpg" class="pokemon" width="10%" height="50%"></a>
</div>
<main class="container">
  <div class="p-4 p-md-5 mb-4 text-dark background-image" style="background-color: lightblue;">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Escuela Submarinismo Andersen</h1>
      <p class="lead my-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Unete a las inversiones</strong>
          <h3 class="mb-0">¡Descubre sitios increibles!</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
          <a href="#" class="stretched-link">Leer mas...</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="images/tortuga.jpg" width="200" height="210">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Apuntate a las clases</strong>
          <h3 class="mb-0">Unete a nosotros</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
          <a href="#" class="stretched-link">Leer mas...</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="images/submarinista.jpg" width="200" height="210">
        </div>
      </div>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Sobre nosotros
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title">Sobre inscripción</h2>
        <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>

        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
        <hr>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
        <h2>¿Como me apunto a las clases?</h2>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor:</p>
        <blockquote class="blockquote">
          <p>¡Justo así!</p>
        </blockquote>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
        <h3>Reglas de las inversiones</h3>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor:</p>
        <ul class="text-white">
          <li>First list item</li>
          <li>Second list item with a longer description</li>
          <li>Third list item to close it out</li>
        </ul>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit:</p>
        <ol class="text-white">
          <li>First list item</li>
          <li>Second list item with a longer description</li>
          <li>Third list item to close it out</li>
        </ol>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
      </article>

      <article class="blog-post" name="listatrabajadores" id="listatrabajadores">
        <h3>Lista profesores submarinistas</h3>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit:</p>
        <?php
$conexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($conexion, "cartbasic1");
$resultado = mysqli_query($conexion, "SELECT * FROM usuario WHERE admin <> 0");
$tabla = "<table border='1' cellpadding='10'>\n";
$tabla .= "<tr><th>Nombre</th></tr>\n";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $tabla .= "<tr>
                        <td>" . $fila["nombre"] . "</td>
                    </tr>\n";
}
$tabla .= "</table>\n";
echo $tabla;
?>


        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget turpis dolor.</p>
      </article>

      <article class="blog-post">
        <h2 class="blog-post-title" name="redesSociales" id="redesSociales">Redes Sociales</h2>
        <ul class="text-white">
          <li>Instagram</li>
          <li>Twitter</li>
          <li>Facebook</li>
        </ul>
      </article>

      <nav class="blog-pagination text-white" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Volver al principio</a>
      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3">
          <h4 class="fst-italic">Información importante</h4>
          <p class="mb-0 text-white">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Fecha de las próximas clases</h4>
          <ol class="list-unstyled mb-0 text-white">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>
  </body>
</html>