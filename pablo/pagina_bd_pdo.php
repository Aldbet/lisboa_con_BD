<?php include 'contenido.php' ?>
<?php require 'head.php' ?>
<?php //creamos la variable de la página para identificar su contenido
$idPagina = intval($_GET['id']);
?>
<?php
try {
  $conexion = new PDO('mysql:host=localhost;dbname=lisboa_bd', 'root' , '');
  $sql = "SELECT * FROM contenido WHERE id=$idPagina" ;
  //HACEMOS LA CONEXION CON UN OBJETO MYSQLI - ESTO PUEDE IR EN OTRO PHP TIPO conexion.php
  $resultados = $conexion->query($sql);
  $data=array(); // CREAMOS UN ARRAY QUE IDENFIFICAREMOS CON RESULTADOS
// ALMACENAMOS LO TRAIDO EN EL ARRAY DATA YA CREADO. HAY QUE CREARLO ANTES
// $data  = $resultados->fetch_assoc();
$data  = $resultados->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "ERROR: " . $e->getMessage();
  die();
}
?>


<title>PRÁCTICA LOOP FOREACH EN PHP - PAGINA</title>
<meta name="description" content="PRÁCTICA LOOP FOREACH EN PHP">

  </head>
  <body>
  
<?php require 'header.php' ?>

<?php 


//comprobacion de cómo trae el array con un Var Dump:
/*
if ($resultados->num_rows) {
  echo '<pre>';
  var_dump($resultados->fetch_assoc());
  echo '</pre>';
} else {
  echo 'No hay datos';
}
*/
/*
//UN EJEMPLO DE BUCLE WHILE
if ($resultados->num_rows > 0) {
  // output data of each row
  
  while($row = $resultados->fetch_assoc()) {
    $data=$row;
    // comprobamos el array traido
    var_dump($row);
    // echo '<pre>';
    // echo $resultados->fetch_assoc()['titular'];
    // echo '</pre>';
    echo "<h2>" . $row["titular"] . "</h2>";
    echo "<h2>id: " . $row["id"]. " - Titular: " . $row["titular"]. " " . $row["fecha"]. "</h2><br>";
    $data=$row;
  }
} else {
  echo "0 results";
}
*/
print_r($data); //COMPROBACION PARA VER LO QUE TRAEMOS - BORRAR LUEGO
echo '<h2>' . $data['titular'] . '</h2>'; // ASI TRAEMOS CADA DATO
// foreach ($resultados as $fila) {
//   echo $fila['id'] . '<br>';
// }
?>
<main role="main">

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