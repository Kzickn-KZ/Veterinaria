<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css" type="text/css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="video/gfp-astro-timelapse.mp4" type="video/mp4">
    </video>
    <div class="page-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="cd-slider-nav">
            </div>
          </div>          
        </div>        
      </div>      
      <div class="container-fluid tm-content-container">
        <ul class="cd-hero-slider mb-5 py-5">
          <li class="px-3" data-page-no="1">
            <div class="page-width-1 page-left">
              <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container">
                <div class="intro-left tm-bg-dark">
                  <!-- FORMULARIO INICIO DE SESION -->
                  <h2 class="mb-4">Iniciar Sesión</h2>
                  <p class="mb-4">
                    
                    <form action="Controlador/Validatelog.php" method="POST" name="Finicio" id="Finicio">
                      <p>
                    Correo: 
                    <input type="email" id="usuario" name="usuario" class="form-control"> 
                      </p>
                      <p>
                    Contraseña: 
                    <input type="Password" id="contrasena" name="contrasena" class="form-control">
                    </p>
                    <input type="Submit" Value="Entrar" class="btn btn-primary">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrarse</button>
                    </form> 
                    <!-----FIN FORMULARIO INCIO DE SESION--->
                    <br>
                    
                    <p class="mb-0">
                  INICIO DE SESSION "AGREGAR TEXTO A FUTURO"
                </p>
                </div>
            </div>
          </div>
          <!---INICIO MODAL--->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">REGISTRARSE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!---INICO FORMAULARIO REGISTRO (ANEXAR A MODAL) ---->
                  
                      <form action="Controlador/Validacion.php" method="POST" name="form1" id="form1">
                            <h3>REGISTRARSE</h3><br>
                              Nombre: <br>
                              <input type="text" id="nombre" name="nombre" class="form-control">
                              Correo: <br>
                              <input type="email" id="correo" name="correo" class="form-control">
                              Contraseña: <br>
                              <input type="password" id="contra" name="contra" class="form-control"><br>
                              <input type="submit" name="button" id="button" value="enviar" class="btn btn-success">
                          </form>
                  <!-- FIN FORMULARIO -->
                </div>
                    <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
            <!----FIN MODAL---->     
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.js"></script>
  <script src="js/templatemo-script.js"></script>
</body>
</html>