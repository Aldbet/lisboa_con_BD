<?php
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);



//traemos los datos de cada NAME del formulario y lo asignamos a variables a través del método $_POST
$id = $_POST['id'];
$titular = $_POST['titular'];
$fecha = $_POST['fecha'];
$articulo  = $_POST['articulo']; 
$autor  = $_POST['autor'];
$description = $_POST['description'];
$tag1 = $_POST['tag1'];
$tag2 = $_POST['tag2'];
$tag3 = $_POST['tag3'];
$tag4 = $_POST['tag4'];
$img = $_POST['img'];
//print_r($_POST);
//UPDATE table_name  SET column1=value, column2=value2,... WHERE some_column=some_value 
 $sql = "UPDATE contenido SET titular='$titular', fecha='$fecha', texto='$articulo', autor='$autor', imgPrincipal='$img' description='$description' WHERE id='$id'";

 if($conexion->query($sql)){
    echo "Registro actualizado en la base de datos CONTENIDO<br>";
 } else {
    echo "No se ha podido actualizar el contenido en la base de datos<br>";
 }


/* insercion de tags en tabla */

$sql = "UPDATE tags SET  tag1='$tag1', tag2='$tag2', tag3='$tag3', tag4='$tag4'  WHERE id='$id'";

if($conexion->query($sql)){
   echo "Registro actualizado a la base de datos TAGS<br>";
} else {
   echo "No se ha podido actualizar las tags en la base de datos<br>";
}
echo "Volver a <a href="index.php">INICIO</a>";
?>