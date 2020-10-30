{include 'templates/header.tpl'}
  <main class="container"> <!-- empieza contenido principal -->

    <div class='mt-5 col-4 offset-4 mx-auto shadow-lg p-3 mb-5 bg-white rounded'>
    
      <form class="mr-auto ml-auto" method='POST' action='registrarse'>
        <h5 class='mb-4 text-center text-success text-uppercase'>Registro</h5>
         <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" name='nombre' placeholder="nombre">
        </div>
        <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" class="form-control" name='email' aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <label >Contraseña</label>
          <input type="password" class="form-control" name='password' placeholder="Contraseña">
        </div>
        <div class='text-center mt-4'>
          <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
      </form>
    </div>

  </main>

{include 'templates/footer.tpl'}