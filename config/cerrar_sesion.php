<?php 
session_start();
session_unset();
session_destroy();
header('location: ../index.php');
//header('location: '.$_SERVER['PHP_SELF']);
//die;
?>