{include 'templates/header.tpl'}
  <main class="container"> <!-- empieza contenido principal -->

    <div class="alert alert-warning col-6 offset-3 text-center mt-3" role="alert">
      <p>La contraseña debe tener mínimo 8 caracteres</p>
      <p>Te recomendamos combinar mayúsculas, minusculas y números!</p>
    </div>

    <div class='mt-3 col-4 offset-4 mx-auto shadow-lg p-3 mb-5 bg-white rounded'>
      <form class="mr-auto ml-auto" method='POST' action='registrarse'>
        <h5 class='mb-4 text-center text-success text-uppercase'>Registro</h5>
         <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" name='nombre' placeholder="Nombre">
        </div>
        <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" class="form-control" name='email' aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <input type="password" class="form-control" name='password' placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label>Confirmar contraseña</label>
          <input type="password" class="form-control" name='confirm-password' placeholder="Confirmar contraseña">
        </div>
        <div class='text-center mt-4'>
          <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
      </form>
    </div>

  </main>

{include 'templates/footer.tpl'}