<?php
session_start();
/*
echo session_id();
 if (!isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = "Invitado";
 } 
 echo "Nombre de usuario:" . $_SESSION["usuario"];
*/
 $inactividad = 600;
 // Comprobar si $_SESSION["timeout"] está establecida
 if(isset($_SESSION["timeout"])){
     // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
     $sessionTTL = time() - $_SESSION["timeout"];
     if($sessionTTL > $inactividad){
         session_regenerate_id();
         session_destroy();
         header("Location: index.php");
     }
 }
 // El siguiente key se crea cuando se inicia sesión
 $_SESSION["timeout"] = time();

 /*
 if($_POST["usuario"] = "admin" && $_POST["password"] == sha1($password)){
    $_SESSION["autorizado"] = true;
    session_regenerate_id();
}
*/

?>