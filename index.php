<?php
require_once 'config/sesion.php';
$global = $_SERVER['DOCUMENT_ROOT'];  
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
require (ROOT . "/controller/index_controller.php");
require (ROOT . "/model/index_model.php"); ?>
