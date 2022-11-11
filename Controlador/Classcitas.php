<?php
include_once '../Modelo/Conexion.php';

class Citas{

    public $id_citas;
    public $descripcion;
    public $fecha_hora;
    public $user;
    public $id_tipo_citas;
    public $id_mascota;
    public $id_estado;



public function __construct($descripcion, $fecha_hora,$user, $id_tipo_citas, $id_mascota, $id_estado){

    $this -> id_citas;
    $this -> descripcion = $descripcion;
    $this -> fecha_hora = $fecha_hora;
    $this -> id_tipo_citas = $id_tipo_citas;
    $this -> user = $user;
    $this -> id_mascota = $id_mascota;
    $this -> id_estado = $id_estado;
    $this -> db = New Conexion();

}

    //METODO PARA INSERTAR A LA BD LAS CITAS//
    public function insertCita(){
        $insert_cita = "INSERT INTO citas(descripcion,fecha_hora,user,id_tipo_citas,id_mascota,id_estado)
			VALUES ('$this->descripcion','$this->fecha_hora','$this->user','$this->id_tipo_citas','$this->id_mascota','$this->id_estado')";
            $this->db->query($insert_cita);
			if($this->db->errno){              
			die('<script language="javascript">alert("ERROR");location.href="../Vista/VistaUsuario.php"</script>');
			}else{
			echo '<script language="javascript">alert("SE HA REGISTRADO CORRECTAMENTE");';
				echo 'location.href ="../Vista/VistaUsuario.php"</script>';
			}



    }

    //METODO PARA VER EL TIPO DE CITA//
    static function verCita($WHERE){
        $db = new Conexion();
        $Vcita = "SELECT * FROM tipo_citas $WHERE";
        $vercita = $db ->query($Vcita);
        return $vercita;


    }


    //METODO PARA IMPRIMIR LAS CITAS REGISTRADAS//
    static function verCitaregistrada($WHERE){
        $db = new Conexion();
        $citaregistrada = "SELECT * FROM citas $WHERE";
        $vercitaregistrada = $db ->query($citaregistrada);
        return $vercitaregistrada;


    }

    //METODO CAMBIAR ESTADO DE LA CITA//
    static function cambiarEstados($estado, $codigo){
        $db= new Conexion();
        $mensaje="LA CITA ESTA ACTIVADA";
        if($estado==1){
        $mensaje="LA MASCOTA ESTA QUEDO INACTIVA";
        }
    $sql = "UPDATE citas SET id_estado='$estado' WHERE id_mascota=$codigo";
    $db->query($sql);
    echo ' <script language="javascript">alert("'.$mensaje.'");</script> ';
    echo "<script>location.href='../vista/VistaUsuario.php'</script>";
    }


    static function citaMej($WHERE){
        $db = new Conexion();
        $list = "SELECT * FROM citas INNER JOIN mascota $WHERE";
        $M = $db->query($list);
        return $M;

}

static function cambiarEstadosadmin($estado, $codigo){
    $db= new Conexion();
    $mensaje="LA CITA ESTA ACTIVADA";
    if($estado==1){
    $mensaje="LA MASCOTA ESTA QUEDO INACTIVA";
    }
$sql = "UPDATE citas SET id_estado='$estado' WHERE id_mascota=$codigo";
$db->query($sql);
echo ' <script language="javascript">alert("'.$mensaje.'");</script> ';
echo "<script>location.href='../vista/vistaadmin.php'</script>";
}
}

?>