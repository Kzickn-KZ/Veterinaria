<?php
session_start();
if($_SESSION['nombre']){
	session_destroy();
	header("location:../index.php");
}
header("location:../index.php");
?>