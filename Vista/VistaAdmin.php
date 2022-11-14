<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/slick.css" type="text/css" /> 
    <link rel="stylesheet" href="../css/templatemo-style.css">

-->
</head>
<body>
<?php 
 session_start();
  if(@!$_SESSION['id_usuario']){
      header("Location:../Controlador/Desconectar.php");
}
  
?>
    <video autoplay muted loop id="bg-video">
        <source src="../video/gfp-astro-timelapse.mp4" type="video/mp4">
    </video>
    <div class="page-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="cd-slider-nav">
              <nav class="navbar navbar-expand-lg" id="tm-nav">
                <a class="navbar-brand" href="#">Administrador</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbar-supported-content">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                      <li class="nav-item selected">
                        <a class="nav-link" aria-current="page" href="#0" data-no="1">Clientes</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="2">Citas</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="3">Mascotas</a>
                        <div class="circle"></div>                                  
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../PHPExcel/reporte1.php" data-no="1">Excel</a>
                        <div class="circle"></div>                                  
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="../Controlador/Desconectar.php" data-no="3">Logout</a>
                        <div class="circle"></div>
                      </li>
                    </ul>
                  </div>
              </nav>
            </div>
          </div>          
        </div>        
      </div>      
      <div class="container-fluid tm-content-container">
        <ul class="cd-hero-slider mb-0 py-5">
          <li class="px-3" data-page-no="1">
            <div class="page-width-1 page-left">
              <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container">
                <div class="intro-left tm-bg-dark">
                  <h2 class="mb-4">Clientes</h2>
                  <p class="mb-4">
                    
                  <?php  
                        include_once '../Controlador/Classusuario.php'; 
                        $Con = Usuario::validatelogin("WHERE id_tipo_usuario=2");
                                  echo '<table class="table">
                                  <thead>
                                    <tr class="table-dark">
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Correo</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">activo</th>
                                      <th scope="col">inactivo</th>
                                    </tr>
                                  </thead>';
                        while($arc = mysqli_fetch_assoc($Con)){
                                  $arc['id_usuario'];
                                  echo ' <tbody>';
                                  echo '<tr class="table-dark">';
                                  echo '<td>';
                                      echo $arc['nombre'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['correo'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['id_estado'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo "<a href='../Controlador/estados.php?codigo=$arc[id_usuario]&codigomodificar=55'><button type='button' class='btn btn-danger'>activar</button></a>";
                                  echo '</td>';
                                  echo '<td>';  
                                      echo "<a href='../Controlador/estados.php?codigo=$arc[id_usuario]&codigomodificar=56'><button type='button' class='btn btn-danger'>desactivar</button></a>";
                                  echo '</td>';
                                  echo '</tr>';
                                  }
                                  echo ' <tbody>';
                                  echo '</table>';
                                
                      ?>


                    </p>

                  
                </div>
                <div class="circle intro-circle-1"></div>
                <div class="circle intro-circle-2"></div>
                <div class="circle intro-circle-3"></div>
                <div class="circle intro-circle-4"></div>
              </div>
            </div>            
          </li>
          <li data-page-no="2">
            <!-- Image Carousel -->
            <div class="mx-auto position-relative gallery-container">
              <div class="circle intro-circle-1"></div>
              <div class="circle intro-circle-2"></div>
              <div class="mx-auto tm-border-top gallery-slider">

              <?php  
              
                        include_once '../Controlador/Classcitas.php';
                       
                        $Con = Citas::citaMej("");
                                  echo '<table class="table">
                                  <thead>
                                    <tr class="table-dark">
                                      <th scope="col">Descripcion</th>
                                      <th scope="col">Fecha</th>
                                      <th scope="col">tipo de cita</th>
                                      <th scope="col">estado</th>
                                      <th scope="col">Activo</th>
                                      <th scope="col">inactivo</th>
                                    </tr>
                                  </thead>';
                        while($arc = mysqli_fetch_assoc($Con)){
                                          $arc['id_citas'];
                                  echo ' <tbody>';
                                  echo '<tr class="table-dark">';
                                  echo '<td>';
                                      echo $arc['descripcion'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['fecha_hora'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['id_tipo_citas'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['id_estado'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo "<a href='../Controlador/estados.php?codigo=$arc[id_citas]&codigomodificar=2'><button type='button' class='btn btn-danger'>activo</button></a>";
                                  echo '</td>';
                                  echo '<td>';  
                                      echo "<a href='../Controlador/estados.php?codigo=$arc[id_citas]&codigomodificar=3'><button type='button' class='btn btn-danger'>inactivo</button></a>";
                                  echo '</td>';
                                  echo '</tr>';
                                  }
                                  echo ' <tbody>';
                                  echo '</table>';
                                
                      ?>
                
              </div>
            </div>
          </li>   
          <li data-page-no="3" class="px-3">
            <div class="position-relative page-width-1 page-right tm-border-top tm-border-bottom">
              <div class="circle intro-circle-1"></div>
              <div class="circle intro-circle-2"></div>
              <div class="circle intro-circle-3"></div>
              <div class="circle intro-circle-4"></div>
              <div class="tm-bg-dark content-pad">
                <h2 class="mb-4">Mascotas Registradas</h2>
                      <?php
                      include_once '../Controlador/Classmascota.php';
                        $Con = Mascota::listaMascota("");
                                  echo '<table class="table">
                                  <thead>
                                    <tr class="table-dark">
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Edad</th>
                                      <th scope="col">Raza</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Tipo</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Activor</th>
                                      <th scope="col">Inactivo</th>
                                    </tr>
                                  </thead>';
                        while($arc = mysqli_fetch_assoc($Con)){
                                        $arc['id_mascota'];
                                  echo ' <tbody>';
                                  echo '<tr class="table-dark">';
                                  echo '<td>';
                                      echo $arc['nombre'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['edad'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['raza'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['color'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['id_tipo_animal'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arc['id_estado'];
                                  echo '</td>';
                                  echo '<td>';
                                  echo "<a href='../Controlador/estados.php?codigo=$arc[id_mascota]&codigomodificar=4'><button type='button' class='btn btn-danger'>activo</button></a>";
                                  echo '</td>';
                                  echo '<td>';  
                                  echo "<a href='../Controlador/estados.php?codigo=$arc[id_mascota]&codigomodificar=5'><button type='button' class='btn btn-danger'>inactivo</button></a>";
                              echo '</td>';
                                  echo '</tr>';
                                  }
                                  echo ' <tbody>';  
                                  echo '</table>';
                                 
                      ?>
              </div>              
            </div>
          </li>
          <li data-page-no="4">
            <div class="mx-auto page-width-2">
              <div class="row">
                <div class="col-md-6 me-0 ms-auto">
                  <h2 class="mb-4">Contact Us</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 tm-contact-left">
                  <form action="#" method="POST" class="contact-form">
                    <div class="input-group tm-mb-30">
                        <input name="name" type="text" class="form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="Name">
                    </div>
                    <div class="input-group tm-mb-30">
                        <input name="email" type="text" class="form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="Email">
                    </div>
                    <div class="input-group tm-mb-30">
                        <textarea rows="5" name="message" class="textarea form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="Message"></textarea>
                    </div>
                    <div class="input-group justify-content-end">
                        <input type="submit" class="btn btn-primary tm-btn-pad-2" value="Send">
                    </div>
                  </form>
                </div>
                <div class="col-md-6 tm-contact-right">                  
                  <p class="mb-4">
                    Integer erat turpis, vestibulum pellentesque aliquam
                    ultricies, finibus nec dui. Donec bibendum enim mi,
                    at tristique leo feugiat at.
                  </p>
                  <div>
                    Email: <a href="mailto:info@company.com" class="tm-link-white">info@company.com</a>
                  </div>
                  <div class="tm-mb-45">
                    Tel: <a href="tel:0100200340" class="tm-link-white">010-020-0340</a>
                  </div>
                  <!-- Map -->
                  <div class="map-outer">
                    <div class="gmap-canvas">
                        <iframe width="100%" height="400" id="gmap-canvas"
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
                </div>
              </div>
            </div>            
          </li>
        </ul>
    </div>
 
  <div id="loader-wrapper">            
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>  
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/slick.js"></script>
  <script src="../js/templatemo-script.js"></script>
</body>
</html>