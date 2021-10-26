
<?php 
require_once 'config/sesion.php';
$global = $_SERVER['DOCUMENT_ROOT'];
$global .= "/lisboa_con_BD/config/global.php";
require_once($global);
?>
<?php 
require (ROOT . "/controller/tags_controller.php");
require (ROOT . "/parts/head_sin_metadata.php"); ?>
<title>Artículos con el tag: 
<?php echo $idTag; ?>
 en Lisboa.com
</title>
<meta name="description" content="Artículos con el tag: <?php echo $idTag;?> en nuestro sitio Lisboa.com">
  </head>
  <body>
    
<?php
require (ROOT . "/model/tags_model.php");
?>
