<main role="main">


  <section class="jumbotron text-center">
    <div class="container">
      <h1>Artículos con el tag: #
      <?php echo $idTag; ?>
      </h1>
      
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <?php
        
         // while ($articulo = $resultados->fetch_assoc()) {
          
              // FOREACH FUNCIONA PARA AMBOS TIPOS DE CONEXIÓN, SIN FETCH ASSOC
              foreach($resultados as $articulo){
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
            </div>';
          }//cierre while principal
        ?>
      </div><!-- fin de .row-->
    </div>
  </div>

</main>