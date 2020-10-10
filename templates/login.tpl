
{include 'header.tpl'}

  <main class="container"> <!-- empieza contenido principal -->

    <div class='mt-5 col-4 offset-4 mx-auto shadow-lg p-3 mb-5 bg-white rounded'>
    
      <form class="mr-auto ml-auto" method='POST' action='verify'>
        <h5 class='mb-4 text-center text-success text-uppercase'>Iniciar sesión</h5>
        {if $msg}
          <p class='alert alert-danger mt-3 mb-4 text-center'>{$msg}</p>
        {/if}
        <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" class="form-control" name='email' aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <label >Contraseña</label>
          <input type="password" class="form-control" name='password' placeholder="Contraseña">
        </div>
        <div class='text-center mt-4'>
          <button type="submit" class="btn btn-success">Ingresar</button>
        </div>
      </form>
    </div>

  </main>

{include 'footer.tpl'}