{include 'templates/header.tpl'}

<div>

    <h5 class='mt-4'>Libros publicados</h5>
    <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
            <a class='btn btn-outline-primary btn-sm' href='{BASE_URL}'>Todos</a>
            {foreach from=$generos item=genero}
                <a class='btn btn-outline-primary btn-sm' href='libros/{$genero->nombre}'>{$genero->nombre}</a>
            {/foreach}
    </div>

    <div>
            <div>
            {foreach from=$libros item=libro}
            <div class="card d-inline-block ml-5 mt-5 mb-5" style="width: 14rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h6 class="card-title text-center">{$libro->titulo}</h6>
                    <p class="text-center text-success">${$libro->precio}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Escrito por {$libro->autor}</li>
                    <li class="list-group-item">Editorial {$libro->editorial}</li>
                    <a class='btn btn-success btn-sm col-6 offset-3 mt-1 mb-1' href="detalle/{$libro->id}">DETALLE</a>
                </ul>
                </div>
            {/foreach}
        </div>

    </div>
</div>

{include 'templates/footer.tpl'}
