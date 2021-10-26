<main role="main">


  <section class="jumbotron text-center">
    <div class="container">
      <h1>LISBOA - Sitio de práctica del curso</h1>
      <p class="lead text-muted">Ejercicio desarrollado en el certificado de profesionalidad para práctica de PHP, Bootstrap, SQL y métodos de programación.</p>
      <p>
        <a href="nuevo_articulo.php" class="btn btn-primary my-2">Nuevo artículo</a>
        <a href="#" class="btn btn-secondary my-2">Lista de artículos</a>
      </p>
    </div>
  </section>
  

  <div class="py-5 bg-light">
  <div class="container">
<div class="row mb-3">
  <div class="col-1">
    <div class="row">
      <div class="col"><a href="index.php?d=block"><img src="img/block.png" class="img-fluid"></a></div>
      <div class="col"><a href="index.php?d=grid"><img src="img/grid.png" class="img-fluid"></a></div>
    </div>
  </div>
</div>


      
        <?php
        
          while ($articulo = $resultados->fetch_assoc()) {

            
            
           // echo $articulo['titular'] . '<br>'; // esto ha sido para comprobar que funciona la llamada a contenido.php y el foreach
           echo 
           '<div class="row  mb-5 pb-5 shadow-sm">
              <div class="col-md-4">
                <img src="' . $articulo['imgPrincipal'] . '" class="img-fluid">
              </div>
              <div class="col-md-8">
                  <h2>' . $articulo['titular'] . '</h2>
                  <small>' . $articulo['fecha'] . '</small><br>
                  <p class="card-text">' . $articulo['texto'] . '</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="' . $articulo['url'] . '" type="button" class="btn btn-sm btn-outline-secondary">Ver Más</a>
                    </div>
                    <small class="text-muted">' . $articulo['autor'] . '</small>
                  
                  <small class="text-muted">TAGS: ' ;
                  
                    $tagsVacios=0;
                    $i=1;
                    while ($i<=4) {
                      if ($articulo["tag$i"]=='') {
                        $i++;
                        $tagsVacios++;
                        continue;//salta a la siguiente iteración si el tag está vacio
                      }
                      echo '<a href="tags.php?tag=' . $articulo["tag$i"]  . '">#' . $articulo["tag$i"] . ' </a>';
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
                  <br>
              
            </div>';
          }//cierre while principal
        ?>
      
    </div>
  </div>

</main>