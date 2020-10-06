
{include 'header.tpl'}

<div class='mt-5 w-25 mx-auto shadow-lg p-3 mb-5 bg-white rounded'>
  <form class="mr-auto ml-auto">
    <h5 class='mb-4 text-center text-success text-uppercase'>Iniciar sesión</h5>
    <div class="form-group">
      <label for="exampleInputEmail1">Correo electrónico</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
    </div>
    <div class='text-center mt-4'>
      <button type="submit" class="btn btn-success">Ingresar</button>
    </div>
  </form>
</div>

{include 'footer.tpl'}