<?php
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);


//traemos los datos de cada NAME del formulario y lo asignamos a variables a través del método $_POST
$titular = $_POST['titular'];
$fecha = $_POST['fecha'];
$articulo  = $_POST['articulo']; 
$autor  = $_POST['autor'];
$tags = $_POST['tags'];
$img = $_POST['img'];
$description = $_POST['description'];
//print_r($_POST);

 $sql = "INSERT INTO contenido (titular, fecha, texto, autor, url, imgPrincipal, description ) VALUES ('$titular', '$fecha' , '$articulo', '$autor','temporal' , '$img', '$description') ";

 if($conexion->query($sql)){
    echo "Registro agregado a la base de datos CONTENIDO<br>";
 } else {
    echo "No se ha podido agregar nada a la base de datos<br>";
 }
 //BUSCAMOS EL ID DEL ANTERIOR ULTIMO ARTÍCULO
$sql = "SELECT id FROM contenido ORDER BY id DESC LIMIT 1";
$ultimoId = $conexion->query($sql);
$ultimoId = $ultimoId->fetch_array(); // tambien funcionaría con fetch_array()
//print_r($ultimoId);
//echo "el último artículo tenia un id $ultimoId[0]";
$sql = "UPDATE  contenido  SET url='pagina.php?id=$ultimoId[0]' WHERE id='$ultimoId[0]'";
$conexion->query($sql);

/* insercion de tags en tabla */
$tagsArray = explode(",",$tags);//saca un array del string $tags
//print_r($tagsArray);
//print_r($ultimoId[0]);
while (count($tagsArray) < 4) {
   array_push($tagsArray, "");
}
$sql = "INSERT INTO tags (id, tag1, tag2, tag3, tag4) VALUES ('$ultimoId[0]', '$tagsArray[0]', '$tagsArray[1]', '$tagsArray[2]', '$tagsArray[3]')";

if($conexion->query($sql)){
   echo "Registro agregado a la base de datos TAGS<br>";
} else {
   echo "No se ha podido agregar nada a la base de datos<br>";
}
echo 'Volver a <a href="../index.php">INICIO</a>';
?>