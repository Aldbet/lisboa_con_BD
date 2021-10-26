<?php
// TRAEMOS DATOS DE LA BASE DE DATOS
$data1 = getContenidoById($idPagina);
$data2 = getTagsById($idPagina);
$resultados3 = getImgUrl();
require (ROOT . "/parts/head_pagina.php");
require (ROOT . "/parts/header.php");
require (ROOT . "/view/pagina_view.php");
require (ROOT . "/parts/footer.php");
?>