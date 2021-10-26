<?php 
require_once 'config/sesion.php';
$global = $_SERVER['DOCUMENT_ROOT']; // ESTO DEVUELVE 'LOCALHOST' O SEA LA CARPETA 'HTDOCS'
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
comprobar_sesion();
require (ROOT . "/controller/listado_articulos_controller.php");
require (ROOT . "/model/listado_articulos_model.php") ?>
    
  