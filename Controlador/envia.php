<?php

$nombre = $_POST['name'];
$correo = $_POST['email'];
$descripcion = $_POST['message'];

mail($correo,$nombre,$descripcion);

?>