<?php
include_once 'Classcitas.php';
include_once 'Classusuario.php';
include_once 'Classmascota.php';

//CODIGO PARA CAMBIAR DE ESTADO (CLIENTE)LAS CITAS A INACTIVO//
extract($_GET);
          if(@$codigomodificar==1){
              $id = $_REQUEST['codigo'];
          Citas::cambiarEstados(1, $id);
        }

//CODIGO PARA CAMBIAR DE ESTADO (ADMINISTRADOR) LAS CITAS A ACTIVO//
extract($_GET);
          if(@$codigomodificar==2){
              $id = $_REQUEST['codigo'];
              CItas::cambiarEstadosadmin(2, $id);
          }
//CODIGO PARA CAMBIAR DE ESTADO (ADMINISTRADOR) A CITAS INNACTIVO//
extract($_GET);
          if(@$codigomodificar==3){
              $id = $_REQUEST['codigo'];
              CItas::cambiarEstadosadmin(1, $id);
          }



//modificar estado cliente//
        extract($_GET);
        if(@$codigomodificar==55){
            $id = $_REQUEST['codigo'];
        Usuario::cambiarUsuario(2, $id);
      }


//MODIFICAR MASCOTA ACTIVO //
      extract($_GET);
          if(@$codigomodificar==4){
              $id = $_REQUEST['codigo'];
              Mascota::cambiarEstadosMas(2, $id);
          }

//MODIFICAR MASCOTA INACTIVO//
          extract($_GET);
          if(@$codigomodificar==5){
              $id = $_REQUEST['codigo'];
              Mascota::cambiarEstadosMas(1, $id);
          }
?>