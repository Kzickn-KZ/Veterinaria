<?php
include_once '../Modelo/Conexion.php';

class Mascota{

    public $id_mascota;
    public $nombre;
    public $edad;
    public $raza; 
    public $color;
    public $id_tipo_animal;
    public $id_estado;
    public $id_usuario;


    public function __construct($nombre, $edad, $raza, $color, $id_tipo_animal, $id_estado, $id_usuario){

    
    $this -> id_mascota;
    $this -> nombre = $nombre;
    $this -> edad = $edad;
    $this -> raza = $raza;
    $this -> color = $color;
    $this -> id_tipo_animal = $id_tipo_animal;  
    $this -> id_estado = $id_estado;
    $this -> id_usuario = $id_usuario;
    $this -> db = New Conexion();


    }

    //METODO PARA INSERTAR MASCOTAS//
    public function insertarMascota(){

        $SQL_INSERT_MASCOTA = "INSERT INTO mascota(nombre,edad,raza,color,id_tipo_animal,id_estado,id_usuario)
			VALUES ('$this->nombre','$this->edad','$this->raza','$this->color','$this->id_tipo_animal','$this->id_estado','$this->id_usuario')";
			$this->db->query($SQL_INSERT_MASCOTA);
			if($this->db->errno){
			die('<script language="javascript">alert("ERROR");location.href="../Vista/VistaUsuario.php"</script>');
			}else{
			echo '<script language="javascript">alert("SE HA REGISTRADO CORRECTAMENTE");';
				echo 'location.href ="../Vista/VistaUsuario.php"</script>';
			}
    }
    //METODO PARA VER EL TIPO DE ANIMAL REGISTRADO//
    static function ver_tipo_animal(){
		$db = new Conexion();
		$sqli = "SELECT * FROM tipo_animal";
		$M = $db->query($sqli);
		return $M;
	}


    //METODO PARA IMPRIMIR LAS MASCOTAS REGISTRADAS//
    static function listaMascota($WHERE){
      $db = new Conexion();
      $list = "SELECT * FROM mascota $WHERE";
      $L = $db->query($list);
      return $L;
    }

    static function cambiarEstadosMas($estado, $codigo){
      $db= new Conexion();
      $mensaje="LA MASCOTA ESTA ACTIVADA";
      if($estado==1){
      $mensaje="LA MASCOTA ESTA QUEDO INACTIVA";
      }
  $sql = "UPDATE mascota SET id_estado='$estado' WHERE id_mascota=$codigo";
  $db->query($sql);
  echo ' <script language="javascript">alert("'.$mensaje.'");</script> ';
  echo "<script>location.href='../vista/vistaadmin.php'</script>";
  }





}

?>