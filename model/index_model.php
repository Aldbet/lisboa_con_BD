<?php 
// Si un usuario entra con una URL index.php cargará index_view.php
// si el usuario aprieta el boton de bloques de la pagina index, se cargará index_blocks_view.php
// si el usuario aprieta el boton de grid cargará index_view.php 
// hace falta añadir los botones en los views 
$resultados = getAll();
$data3 = getMetadataByIdmd(1);
require (ROOT . "/parts/head.php");
require (ROOT . "/parts/header.php");
if ($d=="grid") {
    require (ROOT . "/view/index_view.php");
} else {
    if ($d == "block") {
        require (ROOT . "/view/index_blocks_view.php");
    } else {
        require (ROOT . "/view/index_view.php");
    }
    
}
require (ROOT . "/parts/footer.php");
?>