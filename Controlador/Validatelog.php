<?php 
session_start();
$correo = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

require_once 'Classusuario.php';

$login = Usuario::validatelogin("WHERE correo='$correo'");
while($estatus = mysqli_fetch_assoc($login))
$statud = $estatus['id_tipo_usuario'];

if($statud==2){

$SQL = Usuario::validatelogin("WHERE correo='$correo' and contrasena=sha1('$contrasena')");
if($f = mysqli_fetch_assoc($SQL)){
    $_SESSION['id_usuario']=$f['id_usuario'];
    $_SESSION['nombre']=$f['nombre'];
    $_SESSION['correo']=$f['correo'];
    $_SESSION['contrasena']=$f['contrasena'];
    $_SESSION['id_tipo_usuario']=$f['id_tipo_usuario'];
    $_SESSION['id_estado']=$f['id_estado'];
        echo '<script>alert("BIENVENIDO USUARIO")</script> ';
        echo "<script>location.href='../Vista/VistaUsuario.php'</script>";
    }else{
        echo '<script>alert("ERROR :( ")</script> ';
        echo "<script>location.href='../index.php'</script>";
         }
       
      
}elseif($statud==1){

    $SQLADMIN = Usuario::validatelogin("WHERE correo='$correo' and contrasena=sha1('$contrasena')");
    if($S = mysqli_fetch_assoc($SQLADMIN))
    {
        $_SESSION['id_usuario']=$S['id_usuario'];
        $_SESSION['nombre']=$S['nombre'];
        $_SESSION['correo']=$S['correo'];
        $_SESSION['contrasena']=$S['contrasena'];
        $_SESSION['id_tipo_usuario']=$S['id_tipo_usuario'];
        $_SESSION['id_estado']=$S['id_estado'];
    
            echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
            echo "<script>location.href='../Vista/VistaAdmin.php'</script>";
        }else{
            echo '<script>alert("ERROR ADMINISTRADOR :( ")</script> ';
            echo "<script>location.href='../index.php'</script>";
    }
}


?>