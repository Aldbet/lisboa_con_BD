<?php 
// traemos por ID de contenido:
$data1 = getContenidoById($idPagina);
//traemos por id de tags:
$data2 = getTagsById($idPagina);
$data3 = getMetadataByIdmd(4);
require (ROOT . "/parts/head.php");
require (ROOT . "/parts/header.php");
require (ROOT . "/view/actualizar_articulo_view.php");
require (ROOT . "/parts/footer.php"); 
?>