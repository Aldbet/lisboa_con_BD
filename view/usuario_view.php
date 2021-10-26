<main role="main">
    <div class="container">
      <div class="row pt-5">
        <div class="col-6 mx-auto">
          <h2>Formulario para hacer Login</h2>
          <form method="post" action="database/hacer_usuario.php" name="signup-form">
    <div class="form-element">
        <label>Nombre de Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="text" name="password" required />
    </div>
    <button type="submit" name="register" value="register" >Register</button>
</form>
    
</div>  
</div>
</div>
</main>