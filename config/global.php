<?php
// ARCHIVO PARA AJUSTES GLOBALES DEL SITIO
// LO MÁS RAIZ
$db = [
    "host" => "localhost",
    "user" => "root",
    "password" => '',
    "database_name" => 'lisboa_bd',
];
require_once 'conexion.php';
require_once 'functions.php';
define ("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/lisboa_con_BD");
require_once (ROOT . "/model/db.php");

?>