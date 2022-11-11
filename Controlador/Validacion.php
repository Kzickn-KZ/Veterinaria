<?php 
//LLAMAMOS A LA CLASE USUARIO//
include_once 'Classusuario.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$id_tipo_usuario = 2;
$id_estado = 2;

$usuario = new Usuario($nombre, $correo, $contra, $id_tipo_usuario, $id_estado);
$usuario->insertar();




?>