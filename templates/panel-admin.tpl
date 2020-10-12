{include 'templates/header.tpl'}

  <main class="container"> <!-- empieza contenido principal -->

    {if !isset($smarty.session.ADMIN) || $smarty.session.ADMIN == false}
    <div class='alert alert-danger mt-3 mb-5 text-center col-6 offset-3'>
      <p class=''>NO ESTÁS LOGEADO O NO TIENES PERMISOS</p>
      <a class='btn btn-danger btn-sm text-uppercase m-2' href=''>Volver al inicio</a>
    </div>
    {/if}

    {if isset($smarty.session.ADMIN) && $smarty.session.ADMIN == true}
      <div class='col-12 mt-4 row'>

        <div class="card col-4 mr-2">
          <h5 class="card-header">LIBROS</h5>
          <div class="card-body">
            <h5 class="card-title">Administrar libros</h5>
            <p class="card-text">Aqui podra editar, agregar y eliminar libros</p>
            <a href="admin/libros" class="btn btn-primary">IR</a>
          </div>
        </div>

        <div class="card col-4 mr-2">
          <h5 class="card-header">GENEROS</h5>
          <div class="card-body">
            <h5 class="card-title">Administrar generos</h5>
            <p class="card-text">Aqui podra editar, agregar y eliminar generos</p>
            <a href="admin/generos" class="btn btn-primary">IR</a>
          </div>
        </div>
      </div>
    {/if}

  </main>

{include 'templates/footer.tpl'}
