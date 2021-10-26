<?php include 'contenido.php' 
// A BORRAR UNA VEZ FUNCIONE TODO CON LA BASE DE DATOS
?>

<?php require 'head.php' ?>
<title>PRÁCTICA LOOP FOREACH EN PHP - PAGINA</title>
<meta name="description" content="PRÁCTICA LOOP FOREACH EN PHP">
<?php //creamos la variable de la página para identificar su contenido
$idPagina = intval($_GET['id']);
?>
  </head>
  <body>
    
<?php require 'header.php' ?>

<main role="main">
<?php require 'conexion.php' ?>
<!-- AQUI HAREMOS EL TEST DE CONEXION A LA BD -->
<?php
//// hay 3 formas de conectar, MYSQL() - MYSQLI() - PDO()
////HACEMOS LA CONEXION CON UN OBJETO MYSQLI - ESTO PUEDE IR EN OTRO PHP 
////$conexion = new mysqli('servidor', 'usuario', 'contraseña', 'nombre de la base de datos');
//$conexion = new mysqli('localhost', 'root', '', 'lisboa_bd');
//// vamos a poner un condicional para ver si se nos conecta bien a la bbdd o no, solo para pruebas:
/*
if ($conexion->connect_errno) {
  //// echo 'Conexión Fallida';  ---- esto seria una posibilidad
  die('Conexión Fallida!');
} else {
  echo '<h2>La base de datos LISBOA_BD se ha conectado correctamente!.</h2>';// esto solo para pruebas iniciales
}
*/
?>
<?php
// AQUI VAMOS A TRAER LOS DATOS QUE QUEREMOS DE LA BASE DE DATOS A LA PÁGINA:
$consulta_sql = "SELECT * FROM contenido WHERE id=$idPagina";
$resultados = $conexion->query($consulta_sql);

// AQUI VAMOS A HACER UNA COMPROBACIÓN DE LOS DATOS TRAIDOS POR LA CONSULTA, SOLO PARA VERLOS Y APRENDER
// USAMOS UN VAR_DUMP PARA VER EL CONTENIDO
/*
if ($resultados->num_rows) {
  echo '<pre>';
  echo 'Número de filas importadas: ' . $resultados->num_rows . '<br>';
  var_dump($resultados->fetch_assoc());
  // mysqli_fetch_assoc($resultados);  este método es equivalente (parecido) al anterior
  // fetch_assoc() trae los resultados de la consulta en un array asociativo
  var_dump($resultados->fetch_array());
   // fetch_array() trae los resultados de la consulta en un array asociativo y numérico. Interesante para consultas tipo : 'mostrar 20 productos'
   // se usan los dos, el fetch_assoc y el fetch_array
  echo '</pre>';
} else {
  echo "No se han obtenido resultados";
}
*/
// OPCION 1 DE TRAER DATOS A UN ARRAY Y LUEGO USARLO
// APLICAR EL FETCH_ASSOC A SI MISMO ($RESULTADOS)
//$resultados = $resultados->fetch_assoc();
//echo '<h2>El titular: ' . $resultados['titular'] . '</h2>';

// OPCION 2 DE TRAER DATOS A UN ARRAY Y LUEGO USARLO
// APLICAR EL FETCH_ASSOC Y ASIGNARLO A OTRO ARRAY
$data1 = array();
$data1 = $resultados->fetch_assoc();
echo '<h2>El titular: ' . $data1['titular'] . '</h2>';
// LA OPCIÓN 2 PERMITE TÉCNICAS PARA MÚLTIPLES DATA EN UNA SOLA PAGINA, PARA CONSULTAS MÚLTIPLES, ENTRE OTRAS COSAS

?>


  <section class="jumbotron text-center">
    <div class="container">
      <h1>PRÁCTICA DE PLANTILLA DE PÁGINA DE CONTENIDOS</h1>
      <p class="lead text-muted">Esta es la plantilla que usamos para mostrar cada artículo por separado.</p>
      <p>
        <?php if(!$idPagina == 0){
         echo '<a href="pagina.php?id=' .  $idPagina - 1  . '"> ARTÍCULO ANTERIOR </a> | ';}//Esto hace que no se muestre nada si es el primer artículo el de esta página, para que no se muestre nada ya que iría a la pagina -1 que no existe
        ?>
        
        <a href="pagina.php?id=<?php echo $idPagina;   ?>"> ESTE ARTÍCULO </a>
        <?php if($idPagina == count(LISBOA) - 1){
          echo ' | <span class="text-muted"> No hay más artículos</span>';
        } else {
        echo ' | <a href="pagina.php?id=' . $idPagina + 1 . '"> ARTÍCULO SIGUIENTE </a> </p>';
        }
        ?>
      
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row"><!-- row del artículo principal-->
        <div class="col-md-6">
          <img src="<?php echo LISBOA[$idPagina]['imgPrincipal'] ?>" alt="Lisboa y sus tranvías" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2><?php echo LISBOA[$idPagina]['titular'] ?></h2>
          <p><small><?php echo LISBOA[$idPagina]['fecha'] ?></small></p>
          <p><?php echo LISBOA[$idPagina]['texto'] ?></p>
          <p><b><?php echo LISBOA[$idPagina]['Autor'] ?></b></p>
          <p><small>Tags de este artículo:<b>
            <?php
              if (!isset(LISBOA[$idPagina]['tags'])) {
                echo 'No hay tags';
              } else {
                foreach (LISBOA[$idPagina]['tags'] as $key => $value) {
                  echo '#' . $value . ', ';
                }
                }
              ;
            ?>
          </b></small></p>
        </div>


      </div><!--fin de row-->

      <div class="row">
        <div class="col-md-6  py-5"><!-- cuadro con miniaturas de imagenes-->
          <h3>Navegar por imágenes</h3>
          <div class="row">
            <?php  
              foreach (LISBOA as $key => $articulo) {
                echo '<div class="col-4 p-3"><a href="' . $articulo["url"] . '"> <img src="' . $articulo['imgPrincipal'] . '" class="img-fluid"></a></div>';
              }
                ?>
          </div>
        </div>

      
        <div class="col-md-6 py-5"> <!-- MENU DE TODOS LOS ARTÍCULOS-->
                  <h3>Todos los artículos</h3>
            <?php  
            foreach (LISBOA as $key => $articulo) {
              echo '<a href="' . $articulo["url"] . '">' .  $articulo["titular"] . '</a><br>';
            }
              ?>
        </div>

      </div><!--fin de row-->
      
    </div><!--fin container-->
  </div><!--fin album-->

</main>


<?php require 'footer.php' ?>