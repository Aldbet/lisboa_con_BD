<?php
require_once 'config/sesion.php';

$global = $_SERVER['DOCUMENT_ROOT']; // ESTO DEVUELVE 'LOCALHOST' O SEA LA CARPETA 'HTDOCS'
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
?>
<?php //LLAMAMOS AL CONTROLADOR PARA TRAER DATOS DE LA URL
require (ROOT . "/controller/pagina_controller.php"); 
require (ROOT . "/model/pagina_model.php");
?>