<?php
/*******CONEXION A BASE DE DATOS TIPO 1 - CON MYSQLI */
$conexion = new mysqli($db["host"], $db["user"], $db["password"], $db["database_name"]);
$conexion->set_charset("utf8");
//// vamos a poner un condicional para ver si se nos conecta bien a la bbdd o no, solo para pruebas:
if ($conexion->connect_errno) {
  //// echo 'Conexión Fallida';  ---- esto seria una posibilidad
  die('Conexión Fallida!');
} else {
  //echo '<h2>La base de datos LISBOA_BD se ha conectado correctamente!.</h2>';// esto solo para pruebas iniciales
}

/*******CONEXION A BASE DE DATOS TIPO 2 - CON PDO Y USANDO TRY/CATCH ***
try {
  //$conexion = new PDO('mysql:host=HOST_BASE_DATOS; dbname=NOMBRE_BASE_DATOS', 'USUARIO_BASE_DATOS', 'PASSWORD');
  $conexion = new PDO('mysql:host=localhost; dbname=lisboa_bd', 'root', '');
  $conexion->exec("set names utf8"); //para evitar errores de caracteres
	 echo "Conexión correcta";
} catch (PDOException $e) {
  // Obtener errores
	echo "Error: " . $e->getMessage();
}
*/

?>