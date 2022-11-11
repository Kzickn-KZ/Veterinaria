<?php
session_start();
require_once 'Classcitas.php';

$descripcion = $_POST['descripcion'];
$fecha_hora = $_POST['fechahora'];
$user = $_SESSION['id_usuario'];
$id_tipo_citas = $_POST['tipo_cita'];
$id_mascota = $_POST['usumascota'];
$id_estado = 2;


$Cita = new Citas($descripcion, $fecha_hora,$user, $id_tipo_citas, $id_mascota, $id_estado);
$Cita -> insertCita();

$mensaje = "SE HA REGISTRADO TU CITA CORRECTAMENTE CON LA FECHA:".$fecha_hora."";
$mail = mail($_SESSION['correo'],'Registro de cita',$mensaje);



?>