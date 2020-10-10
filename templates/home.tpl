{include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->

        <div>

            <h5 class='mt-4'>Libros publicados</h5>
            <div class='text-center'>
                <div class="btn-group" role="group" aria-label="Basic example">
                        <a class='btn btn-success btn-sm text-uppercase' href='{BASE_URL}'>Todos</a>
                        {foreach from=$genres item=genre}
                            <a class='btn btn-success btn-sm text-uppercase' href='libros/{$genre->nombre}'>{$genre->nombre}</a>
                        {/foreach}
                </div>
            </div>
            

            <div>
                    <div>
                    {foreach from=$books item=book}
                    <div class="card d-inline-block ml-5 mt-5 mb-3" style="width: 14rem;">
                        <img class="card-img-top h-25" src="https://image.freepik.com/vector-gratis/boceto-realista-libro-abierto_125494-10.jpg" alt="Portada del libro">
                        <div class="card-body">
                            <h6 class="card-title text-center">{$book->titulo}</h6>
                            <p class="text-center text-success">${$book->precio}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Escrito por {$book->autor}</li>
                            <li class="list-group-item">Editorial {$book->editorial}</li>
                            <a class='btn btn-success btn-sm col-6 offset-3 mt-1 mb-1' href="detalle/{$book->id}">DETALLE</a>
                        </ul>
                        </div>
                    {/foreach}
                </div>

            </div>
        </div>

    </main>

{include 'templates/footer.tpl'}
