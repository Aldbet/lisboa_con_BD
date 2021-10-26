<?php
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
$id = $_POST['id'];

$sql = "DELETE FROM CONTENIDO WHERE id='$id'";
if($conexion->query($sql)){
  echo "Registro Borrado en la base de datos CONTENIDO <br>";
} else {
  echo "No se ha podido borrar el contenido en la base de datos<br>";
}
$sql = "DELETE FROM TAGS WHERE id='$id'";
if($conexion->query($sql)){
  echo "Registro borrado en la base de datos TAGS<br>";
} else {
  echo "No se han podido borrar los tags en la base de datos<br>";
}
echo "Volver a <a href='index.php'>INICIO</a>";
?>