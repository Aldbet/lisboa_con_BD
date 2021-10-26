
<?php require 'conexionPDO.php' ?>
<?php //creamos la variable de la página para identificar su contenido
if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $idPagina = intval(htmlspecialchars($_GET['id']));
  }else {
    header("location: index.php");
  }
?>
<?php
$consulta_sql = "SELECT * FROM contenido WHERE id=$idPagina";
$resultados= $conexion->query($consulta_sql)
or die ("Algo ha ido mal en la consulta a la base de datos");
if($conexion->num_rows == 0){
  header("location: index.php");
  }
$data1 = array();
$data1 = $resultados->fetch( PDO::FETCH_ASSOC );

//echo '<h2>El titular: ' . $data1['titular'] . '</h2>';
// traemos los datos de la tabla TAGS, los tags de ESTA ENTRADA
$consulta_sql = "SELECT * FROM tags WHERE id=$idPagina";
$resultados = $conexion->query($consulta_sql)
or die ("Algo ha ido mal en la consulta a la base de datos");
$data2 = array();
$data2 = $resultados->fetch( PDO::FETCH_ASSOC );

//echo var_dump($data2);
$consulta_sql = "SELECT url, imgPrincipal FROM contenido";
$resultados3 = $conexion->query($consulta_sql)
or die ("Algo ha ido mal en la consulta a la base de datos"); 
?>


<?php require 'head.php' ?>
<title>PRÁCTICA PÁGINA DINÁMICA CON BASE DE DATOS</title>
<meta name="description" content="PRÁCTICA PÁGINA DINÁMICA CON BASE DE DATOS EN PHP">

  </head>
  <body>
    
<?php require 'header.php' ?>

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
        <!-- rowCount() es para conexiones PDO y sustituye a num_rows que es de conexiones mysqli -->
        <?php if($idPagina == $resultados3->rowCount() - 1){
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
          <img src="<?php echo $data1['imgPrincipal'] ?>" alt="Lisboa y sus tranvías" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2><?php echo $data1['titular'] ?></h2>
          <p><small><?php echo $data1['fecha'] ?></small></p>
          <p><?php echo $data1['texto'] ?></p>
          <p><b><?php echo $data1['autor'] ?></b></p>
          <p><small>Tags de este artículo:<b>
            <?php
              if (!isset($data2['tag1'])) {
                echo 'No hay tags';
              } else {
                $i = 1;
                while ($i<=4) {
                  if ($data2["tag$i"]=='') {
                    $i++;
                    continue;//salta a la siguiente iteración si el tag está vacio
                  }
                  echo '<a href="tags.php?tag=' . $data2["tag$i"]  . '">' . $data2["tag$i"] . ' </a>';
                  $i++;
                }
                /*echo '<a href="tags.php?tag=' . $data2['tag1']  . '">' . $data2['tag1'] . '</a>'
                . ' ' . '<a href="tags.php?tag=' . $data2['tag2']  . '">' . $data2['tag2'] . '</a>' 
                . ' ' .  '<a href="tags.php?tag=' . $data2['tag3']  . '">' . $data2['tag3'] . '</a>' 
                . ' ' . '<a href="tags.php?tag=' . $data2['tag4']  . '">' . $data2['tag4'] . '</a>';*/
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
            
                      
        
              //while ($fila = $resultados3->fetch_assoc()) {
                while ($fila = $resultados3->fetch( PDO::FETCH_ASSOC )) {
                echo '<div class="col-4 p-3"><a href="' . $fila["url"] . '"> <img src="' . $fila['imgPrincipal'] . '" class="img-fluid"></a></div>';
              };
                ?>
                 
          </div>
        </div>

        <div class="col-md-6 py-5"> <!-- MENU DE TODOS LOS ARTÍCULOS-->
                  <h3>Todos los artículos</h3>
            <?php  
            $consulta_sql = "SELECT titular, url FROM contenido";
            $resultados3 = $conexion->query($consulta_sql);
           //while ($fila = $resultados3->fetch_assoc()) {
            while ($fila = $resultados3->fetch( PDO::FETCH_ASSOC )) {
              echo '<a href="' . $fila["url"] . '">' .  $fila["titular"] . '</a><br>';
            }
              ?>
        </div>

      </div><!--fin de row-->
      
    </div><!--fin container-->
  </div><!--fin album-->

</main>


<?php require 'footer.php' ;
$conexion=null; //cierre de conexion PDO a la BD
?>