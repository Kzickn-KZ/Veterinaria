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
    <!---INICIO NAV--->
    <div class="page-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="cd-slider-nav">
              <nav class="navbar navbar-expand-lg" id="tm-nav">
                <a class="navbar-brand" href="#"> BIENVENIDO <?php $nom = $_SESSION['nombre']; echo $nom; ?></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbar-supported-content">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                      <li class="nav-item selected">
                        <a class="nav-link" aria-current="page" href="#0" data-no="1">Mascotas</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="3">Añadir / Ver Citas</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="4">Contacto</a>
                        <div class="circle"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../Controlador/Desconectar.php">Logout</a>
                        <div class="circle"></div>
                      </li>
                      
                    </ul>
                  </div>
              </nav> 
            </div>
          </div>          
        </div>        
      </div>  
      <!---FIN NAV--->    
      <div class="container-fluid tm-content-container">
        <ul class="cd-hero-slider mb-0 py-5">
          <li class="px-3" data-page-no="1">
            <div class="page-width-1 page-left">
              <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container">
                <div class="intro-left tm-bg-dark">
                  <h2 class="mb-4">Tus Mascotas</h2>
                  <p class="mb-4">
                    <!---TABLA DE MASCOTAS QUE TENDRA EL CLIENTE (FALTA AÑADIR VISUAL)---->
                    <?php
                        include_once '../Controlador/Classmascota.php';
                        $Con = Mascota::listaMascota("WHERE id_usuario= '$_SESSION[id_usuario]';");
                                  echo '<table class="table">
                                  <thead>
                                    <tr class="table-dark">
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Edad</th>
                                      <th scope="col">Raza</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Tipo</th>
                                    </tr>
                                  </thead>';
                        while($arc = mysqli_fetch_assoc($Con)){
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
                                  echo '</tr>';
                                  }
                                  echo ' <tbody>';
                                  echo '</table>';
                                 
                      ?>


                    </p>
                    <!---FIN TABLA DE MASCOTAS QUE TENDRA EL CLIENTE ---->
                  <p class="mb-0">
                  
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Añadir Mascota</button>
                   <br>
                  <!---INICIO MODAL--->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">REGISTRARSE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!--FORMULARIO PARA AÑADIR MASCOTAS-->
                  <form action="../Controlador/Insertmascota.php" method="POST">
                    Nombre:
                    <input type="text" name="nombremascota" id="nombremascota"><br>
                    Edad (meses): 
                    <input type="text" name="edad" id="edad"><br>
                    Raza:
                    <input type="text" name="raza" id="raza"><br>
                    Color: 
                    <input type="text" name="color" id="color"><br>
                    Tipo de animal:
                    <Select id="tipanimal" name="tipanimal" class="form-control">
                        <option value="null">Seleccione ... </option>
                        <?php include_once '../Controlador/Classmascota.php';
                        $sql = Mascota::ver_tipo_animal();
                        while($row = mysqli_fetch_assoc($sql)){
                        echo "<option value=\"".$row['id_tipo_animal']."\">".$row['nombre']."</option>";
                        } ?>
                      
                    </Select>
                    <input type="submit" name="buton" id="buton" value="GUARDAR" class="btn btn-success">
                  </form> 
                  <!---FIN FORMULARIO PARA AÑADIR MASCOTAS-->
                  </div>
                    <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
<!----FIN MODAL---->    
                </p>
                </div>
                <div class="intro-right">
                  <img src="../img/dog.jpg" alt="Image" class="img-fluid intro-img-1">
                </div>
                <div class="circle intro-circle-1"></div>
                <div class="circle intro-circle-2"></div>
                <div class="circle intro-circle-3"></div>
                <div class="circle intro-circle-4"></div>
              </div>
            </div>            
          </li>
          <!---QUITAMOS MODULO 2 ---->
          <li data-page-no="3" class="px-3">
            <div class="position-relative page-width-3 page-right tm-border-top tm-border-bottom">
              <div class="circle intro-circle-1"></div>

              <div class="tm-bg-dark content-pad">
                <!-----TABLA VISUAL USUARIO DE SUS CITAS---->
                <?php
                        include_once '../Controlador/Classcitas.php';
                        $Concita = Citas::verCitaregistrada("WHERE user='$_SESSION[id_usuario]';");
                                  echo '<table class="table">
                                  <thead>
                                    <tr class="table-dark">
                                      <th scope="col">Descripcion</th>
                                      <th scope="col">Fecha y Hora</th>
                                      <th scope="col">Tipo de cita</th>
                                      <th scope="col">Mascota</th>
                                      <th scope="col">Estado</th>
                                      <th scope="col">Cancelar?</th>
                                      
                                    </tr>
                                  </thead>';
                        while($arconsu = mysqli_fetch_assoc($Concita)){
                                  $arconsu['id_citas'];
                                  echo ' <tbody>';
                                  echo '<tr class="table-dark">';
                                  echo '<td>';  
                                      echo $arconsu['descripcion'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arconsu['fecha_hora'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arconsu['id_tipo_citas'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arconsu['id_mascota'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo $arconsu['id_estado'];
                                  echo '</td>';
                                  echo '<td>';
                                      echo "<a href='../Controlador/estados.php?codigo=$arconsu[id_citas]&codigomodificar=1'><button type='button' class='btn btn-danger'>Cancelar</button></a>";
                                  echo '</td>';
                                  }
                                  echo '</tr>';
                                  echo ' <tbody>';
                                  echo '</table>';
                                 
                      ?>
                <!-----TABLA VISUAL USUARIO DE SUS CITAS---->
                <p> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear cita</button><br> 
                <!-- Modal -->
                                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">             
                                        <!-----FORMULARIO PARA AÑADIR CITAS---->
                                        <form action="../Controlador/Validatecita.php" method="POST">
                                          
                                          Descripcion (Maximo 45 caracteres): <br>
                                          <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea><br>
                                          Fecha - Hora
                                          <input type="datetime-local" name="fechahora" id="fechahora"><br>
                                          Tipo de cita
                                            <select name="tipo_cita" id="tipo_cita">
                                              <option value="null">Seleccione ... </option>
                                                <?php include_once '../Controlador/Classcitas.php';
                                                $cita = Citas::verCita("");
                                                while($rowcita = mysqli_fetch_assoc($cita)){
                                                echo "<option value=\"".$rowcita['id_tipo_citas']."\">".$rowcita['nombre']."</option>";
                                                } ?>
                                            </select><br>
                                          Seleciona tu mascota:
                                            <select name="usumascota" id="usumascota">
                                              <option value="null">Seleccione...</option>
                                            <?php include_once '../Controlador/Classmascota.php';
                                                $usumascota = Mascota::listaMascota("WHERE id_usuario = '$_SESSION[id_usuario]';");
                                                while($rowpet = mysqli_fetch_assoc($usumascota)){
                                                echo "<option value=\"".$rowpet['id_mascota']."\">".$rowpet['nombre']."</option>";
                                                } ?>
                                            </select>
                                          <input type="submit" value="Enviar">   
                                        </form>
                                        <!-----FIN FORMULARIO PARA AÑADIR CITAS---->
                                        </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                </p>
              </div>              
            </div>
          </li>
          <li data-page-no="4">
            <div class="mx-auto page-width-2">
              <div class="row">
                <div class="col-md-6 me-0 ms-auto">
                  <h2 class="mb-4">INFORMACION</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 tm-contact-left">
                <form action="../Controlador/envia.php" method="POST" class="contact-form">
                    <div class="input-group tm-mb-30">
                        <input name="name" id="name" type="text" class="form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="Name">
                    </div>
                    <div class="input-group tm-mb-30">
                        <input name="email" id="email" type="text" class="form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="email">
                    </div>
                    <div class="input-group tm-mb-30">
                        <textarea rows="5" name="message" id="message" class="textarea form-control rounded-0 border-top-0 border-end-0 border-start-0" placeholder="Message"></textarea>
                    </div>
                    <div class="input-group justify-content-end">
                        <input type="submit" class="btn btn-primary tm-btn-pad-2" value="Send">
                    </div>
                  </form>
                </div>
                <div class="col-md-6 tm-contact-right">                  
                  <p class="mb-4">
                    Somos una veterinaria ubicada en la ciudad de Bogota
                    en la localidad de Kennedy, donde prestamos diferentes servicios para nuestras Mascotascomo peluqueadas, vacunas
                    cirugias, otros, etc.
                  </p>
                  <div>
                    Email: <a href="mailto:info@company.com" class="tm-link-white">Kzickn@gmail.com</a>
                  </div>
                  <div class="tm-mb-45">
                    Tel: <a href="tel:0100200340" class="tm-link-white">32-294-1547</a>
                  </div>
                  <!-- Map -->
                  <div class="map-outer">
                    <div class="gmap-canvas">
                        <iframe width="100%" height="400" id="gmap-canvas"
                            src="https://www.google.es/maps/place/Pet+Lovers/@4.6279855,-74.1778802,20.32z/data=!4m5!3m4!1s0x8e3f9f8d1407677b:0x4bf5726b4ffe9bbc!8m2!3d4.6281733!4d-74.1778441"
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