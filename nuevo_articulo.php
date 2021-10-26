<?php 
require_once 'config/sesion.php';
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
comprobar_sesion();
require (ROOT . "/controller/nuevo_articulo_controller.php");
require (ROOT . "/model/nuevo_articulo_model.php");
?>
  