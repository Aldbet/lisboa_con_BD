<?php
// ARCHIVO PARA ALMACENAR FUNCIONES GLOBALES PHP
function comprobar_sesion(){
    if (!isset($_SESSION['id_usuario'])){
        header('location: index.php');
    }
}
?>