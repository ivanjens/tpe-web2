
{include 'header.tpl'}

<div class='mt-5 w-25 mx-auto shadow-lg p-3 mb-5 bg-white rounded'>
  <form class="mr-auto ml-auto" method="POST" action="verify">
    <h5 class='mb-4 text-center text-success text-uppercase'>Iniciar sesión</h5>
    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" class="form-control" name="password"id="password" placeholder="Contraseña">
    </div>
    <div class='text-center mt-4'>
      <button type="submit" class="btn btn-success">Ingresar</button>
    </div>
  </form>
</div>

{include 'footer.tpl'}