{include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->

        {if !isset($smarty.session.ADMIN) || $smarty.session.ADMIN == false}
        <div class='alert alert-danger mt-3 mb-5 text-center col-6 offset-3'>
            <p class=''>NO ESTÁS LOGEADO O NO TIENES PERMISOS</p>
            <a class='btn btn-danger btn-sm text-uppercase m-2' href=''>Volver al inicio</a>
        </div>
        {/if}
        
        {if isset($smarty.session.ADMIN) && $smarty.session.ADMIN == true}
        <div>
            <div class='mt-3'>
                <h5>Libros publicados</h5>
                <div class='text-center'>
                    <div class="btn-group" role="group" aria-label="Basic example">
                            <a class='btn btn-success btn-sm text-uppercase' href='{BASE_URL}'>Todos</a>
                            {foreach from=$genres item=genre}
                                <a class='btn btn-success btn-sm text-uppercase' href='libros/{$genre->nombre}'>{$genre->nombre}</a>
                            {/foreach}
                    </div>
                </div>
                <a class='btn btn-outline-success btn-sm' href='formulario-libro/'>AGREGAR LIBRO +</a>
            </div>

            <div>
                <div>
                    {foreach from=$books item=book}
                    <div class="card d-inline-block ml-5 mt-5 mb-3" style="width: 14rem;">
                        <img class="card-img-top" src="..." alt="Portada del libro">
                        <div class="card-body">
                            <h6 class="card-title text-center">{$book->titulo}</h6>
                            <p class="text-center text-success">${$book->precio}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Escrito por {$book->autor}</li>
                            <li class="list-group-item">Editorial {$book->editorial}</li>
                        </ul>
                        <div class='actions text-center mt-2 mb-2'>
                            <a class='btn btn-warning btn-sm' href='formulario-libro/{$book->id}'>EDITAR</a>
                            <a class='btn btn-danger btn-sm' href='eliminar-libro/{$book->id}'>ELIMINAR</a>
                        
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
        {/if}

    </main>
          

{include 'templates/footer.tpl'}
