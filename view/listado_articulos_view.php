<main role="main">
  <div class="container pt-5">
  <h1>Listado de Artículos</h1>
  <!-- ENCABEZADO -->
  <div class="row mt-5 py-1 bg-light text-black-50">
      <div class="col-4">
        <h5>ARTÍCULOS</h5>
      </div>
      <div class="col-2">
      <h5>FECHA:</h5>
      </div>
      <div class="col-2 text-center">
        <h5>ACTUALIZAR</h5>
      </div>
      <div class="col-2 text-center">
      <h5>DUPLICAR</h5>
      </div>
      <div class="col-2 text-center">
      <h5>BORRAR</h5>
      </div>
  </div>
<!-- LOOP -->
<?php
  while ($fila = $resultados_listado->fetch_assoc()) {
    echo '<div class="row  py-2">
      <div class="col-4">
        <a href="pagina.php?id=' . $fila['id'] . '">' . $fila['titular'] . '</a>
      </div>
      <div class="col-2">
      ' . $fila['fecha'] . '
      </div>
      <div class="col-2 text-center">
        <a href="actualizar_articulo.php?id=' . $fila['id'] . '" class="btn btn-sm btn-primary">ACTUALIZAR</a>
      </div>
      <div class="col-2 text-center">
          <form method="post" action="database/duplicar_registro.php" class="d-inline">
            <div class="form-group d-none">
              <input type="text" class="form-control" value="' . $fila['id'] . '"  id="id" name="id">
            </div>
        <button type="submit" class="btn btn-sm btn-info">DUPLICAR</button>
          </form>
      </div>
      <div class="col-2 text-center">
        <form method="post" action="database/borrar_registro.php" class="d-inline">
          <div class="form-group d-none">
            <input type="text" class="form-control" value="' . $fila['id'] . '"  id="id" name="id">
          </div>
        <button type="submit" class="btn btn-sm btn-danger">BORRAR</button>
      </form>
      </div>
      </div><!-- fin de row-->';
  }
  ?>
    
 </div><!--fin container-->
  

</main>