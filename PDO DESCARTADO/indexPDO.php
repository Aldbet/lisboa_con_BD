
<?php require 'conexionPDO.php' ?>
<?php
$consulta_sql = "SELECT * FROM contenido LEFT JOIN tags ON contenido.id=tags.id";
$resultados = $conexion->query($consulta_sql)
or die ("Algo ha ido mal en la consulta a la base de datos");
/*if($conexion->num_rows == 0){
  header("location: index.php");
  }*/
?>
<?php require 'head.php' ?>

<title>PRÁCTICA INDEX CON BASE DE DATOS</title>
<meta name="description" content="PRÁCTICA LOOP FOREACH EN PHP">

  </head>
  <body>
    
<?php require 'header.php' ?>

<main role="main">


  <section class="jumbotron text-center">
    <div class="container">
      <h1>PRÁCTICA index con base de datos</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <?php
        
          //while ($articulo = $resultados->fetch_assoc()) {

            //      PARA PDO
            while ($articulo = $resultados->fetch( PDO::FETCH_ASSOC )) {
           // echo $articulo['titular'] . '<br>'; // esto ha sido para comprobar que funciona la llamada a contenido.php y el foreach
           echo 
           '<div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img src="' . $articulo['imgPrincipal'] . '" class="img-fluid">
                <div class="card-body">
                  <h2>' . $articulo['titular'] . '</h2>
                  <small>' . $articulo['fecha'] . '</small><br>
                  <p class="card-text">' . $articulo['texto'] . '</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="' . $articulo['url'] . '" type="button" class="btn btn-sm btn-outline-secondary">Ver Más</a>
                    </div>
                    <small class="text-muted">' . $articulo['autor'] . '</small>
                  </div>
                  <small class="text-muted">TAGS: ' ;
                  
                    $tagsVacios=0;
                    $i=1;
                    while ($i<=4) {
                      if ($articulo["tag$i"]=='') {
                        $i++;
                        $tagsVacios++;
                        continue;//salta a la siguiente iteración si el tag está vacio
                      }
                      echo '<a href="tagsPDO.php?tag=' . $articulo["tag$i"]  . '">#' . $articulo["tag$i"] . ' </a>';
                      $i++;
                    }
                    if ($tagsVacios==4) {
                      echo 'No hay tags';
                    }
                    
                  //}
                  ;
                  echo '</small>
                  </div>
              </div>
            </div>';
          }//cierre while principal
        ?>
      </div><!-- fin de .row-->
    </div>
  </div>

</main>


<?php require 'footer.php' ;
$conexion=null;
?>