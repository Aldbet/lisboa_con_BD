<main role="main">





  
    <div class="container">
      <div class="row pt-5">
        <div class="col-6 mx-auto">
          <h2>Formulario para nuevo artículo</h2>
          
    <form method="post" action="database/agregar_nuevo_registro.php">
      <div class="form-group">
        <label for="titular">Titular:</label>
        <input type="text" class="form-control" placeholder="El Nuevo Titular" id="titular" name="titular">
      </div>
      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control" placeholder="Fecha de publicación" id="fecha" name="fecha">
      </div>
      <div class="form-group">
        <label for="articulo">Nuevo artículo:</label><br>
        <textarea id="artículo" name="articulo" rows="8" cols="60">
    </textarea>
      </div>
      <div class="form-group">
        <label for="description">Descripción:</label>
        <input type="text" class="form-control" placeholder="Metadatos: descripción" id="description" name="description">
      </div>
      <div class="form-group">
        <label for="autor">Autor:</label>
        <input type="text" class="form-control" placeholder="Autor" id="autor" name="autor">
      </div>
      <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" placeholder="Inserte máximo de 4 tags, separados por comas" id="tags" name="tags">
      </div>
      <div class="form-group">
        <label for="img">Ruta de la Imagen:</label>
        <input type="text" class="form-control" placeholder="img/principales/XXXXX.jpg" id="img" name="img">
      </div>
      <button type="submit" class="btn btn-primary">ENVIAR</button>
</form>
</div>  
</div>
</div>
      
    
  

 

</main>