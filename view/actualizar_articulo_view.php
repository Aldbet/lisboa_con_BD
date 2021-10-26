<main role="main">

    <div class="container">
      <div class="row pt-5">
        <div class="col-6 mx-auto">
          <h2>Formulario para actualizar un artículo</h2>
          
    <form method="post" action="database/actualizar_registro.php">
    <div class="form-group d-none">
        <input type="text" class="form-control" value="<?php echo $data1['id']?>"  id="id" name="id">
      </div>
      <div class="form-group">
        <label for="titular">Titular:</label>
        <input type="text" class="form-control" value="<?php echo $data1['titular']?>" placeholder="El Nuevo Titular" id="titular" name="titular">
      </div>
      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control" value="<?php echo $data1['fecha']?>"  placeholder="Fecha de publicación" id="fecha" name="fecha">
      </div>
      <div class="form-group">
        <label for="articulo">Nuevo artículo:</label><br>
        <textarea id="artículo" name="articulo" rows="8" cols="60"><?php echo $data1['texto']?> 
    </textarea>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <input type="text" class="form-control" value="<?php echo $data1['description']?>" placeholder="Nueva descripción de metadatos" id="description" name="description">
      </div>
      </div>
      <div class="form-group">
        <label for="autor">Autor:</label>
        <input type="text" class="form-control" value="<?php echo $data1['autor']?>"  placeholder="Autor" id="autor" name="autor">
      </div>
      <div class="form-group">
        <label for="tag1">Tag1:</label>
        <input type="text" class="form-control" value="<?php echo $data2['tag1']?>" placeholder="Inserte tag" id="tag1" name="tag1">
      </div>
      <div class="form-group">
        <label for="tag2">Tag2:</label>
        <input type="text" class="form-control" value="<?php echo $data2['tag2']?>" placeholder="Inserte tag" id="tag2" name="tag2">
      </div>
      <div class="form-group">
        <label for="tag3">Tag3:</label>
        <input type="text" class="form-control" value="<?php echo $data2['tag3']?>" placeholder="Inserte tag" id="tag3" name="tag3">
      </div>
      <div class="form-group">
        <label for="tag4">Tag4:</label>
        <input type="text" class="form-control" value="<?php echo $data2['tag4']?>" placeholder="Inserte tag" id="tag4" name="tag4">
      </div>
      <div class="form-group">
        <label for="img">Ruta de la Imagen:</label>
        <input type="text" class="form-control" value="<?php echo $data1['imgPrincipal']?>"  placeholder="img/principales/XXXXX.jpg" id="img" name="img">
      </div>
      <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
</form>
<!-- SEGUNDO FORMULARIO, PARA BORRAR EL ARTÍCULO -->
<form method="post" action="borrar_registro.php">
    <div class="form-group d-none">
        <input type="text" class="form-control" value="<?php echo $data1['id']?>"  id="id" name="id">
      </div>
    <button type="submit" class="btn btn-danger">BORRAR</button>
</form>
</div>  
</div>
</div>
      
    
  

 

</main>