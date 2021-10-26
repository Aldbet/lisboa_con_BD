<?php 
if(isset($_GET['tag'])){
  $idTag = htmlspecialchars($_GET['tag']);
  }else {
    header("location: index.php");
  }

?>