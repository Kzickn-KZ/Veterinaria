<?php 

include_once '../Modelo/Conexion.php';

class Usuario{

    public $id_usuario;
    public $nombre;
    public $correo;
    public $contrasena;
    public $id_tipo_usuario;
    public $id_estado;

    //CONSTRUCTOR//
    public function __construct($nombre, $correo, $contrasena, $id_tipo_usuario, $id_estado){

        $this -> id_usuario;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> contrasena = $contrasena;
        $this -> id_tipo_usuario = $id_tipo_usuario;
        $this -> id_estado = $id_estado;
        $this -> db = new Conexion();
    }
    //INSERTAR USUARIO REGISTRO//
    public function insertar(){
        $SQL_INSERT="INSERT INTO usuario(nombre,correo,contrasena,id_tipo_usuario,id_estado)
			VALUES ('$this->nombre','$this->correo',sha('$this->contrasena'),'$this->id_tipo_usuario','$this->id_estado')";
			$this->db->query($SQL_INSERT);
			if($this->db->errno){
			die('<script language="javascript">alert("ERROR");location.href="../index.php"</script>');
			}else{
			echo '<script language="javascript">alert("SE HA REGISTRADO CORRECTAMENTE");';
				echo 'location.href ="../index.php"</script>';
			}

    }
    //VALIDACION DE INICIO DE SESSION//
    static function validatelogin($WHERE){
        $db = new Conexion();
            $SQL_VAL = "SELECT * FROM usuario $WHERE";
            $D = $db->query($SQL_VAL);
          return $D;
    }


//FUNCION PARA CAMBIAR DE ESTADO EL CLIENTE//
    static function cambiarUsuario($estado, $codigo){
        $db= new Conexion();
        $mensaje="EL USUARIO ESTA ACTIVADA";
        if($estado==1){
        $mensaje="EL USUARIOESTA QUEDO INACTIVA";
        }
    $sql = "UPDATE usuario SET id_estado='$estado' WHERE id_usuario=$codigo";
    $db->query($sql);
    echo ' <script language="javascript">alert("'.$mensaje.'");</script> ';
    echo "<script>location.href='../vista/Vistaadmin.php'</script>";
    }
    
}

?>