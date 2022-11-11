<?php
session_start();
include_once 'Classmascota.php';

$nombre = $_POST['nombremascota'];
$edad = $_POST['edad'];
$raza = $_POST['raza'];
$color = $_POST['color'];
$id_tipo_animal = $_POST['tipanimal'];
$id_estado = 2;
$id_usuario = $_SESSION['id_usuario'];


$Pet = New Mascota($nombre, $edad, $raza, $color, $id_tipo_animal, $id_estado, $id_usuario);
$Pet -> insertarMascota();

?>