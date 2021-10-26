<?php
 
session_start();
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);

if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $resultados = $conexion->query($sql);
    $data_login = array();
    $data_login = $resultados->fetch_assoc();
 
    if (!$data_login) {
        echo '<p class="error">El usuario o contraseña son incorrectos!</p>';
    } else {
                //if (password_verify($password, $data_login['password'])) {
                    if ($password == $data_login['password']) {
                    $_SESSION['usuario'] = $data_login['username'];
                    $_SESSION['id_usuario'] = $data_login['id'];
                    header('location: ../index.php');
                } else {
                    echo '<p class="error">La contraseña son incorrectos!</p>';
                }
            }
    
}
 
?>