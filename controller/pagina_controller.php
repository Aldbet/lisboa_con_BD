<?php
if(isset($_GET['id'])){
    $idPagina = intval(htmlspecialchars($_GET['id']));
    }else {
      header("location: index.php");
    }
?>