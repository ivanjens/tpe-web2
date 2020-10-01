{include 'templates/header.tpl'}

<div>

    
    <div class='mt-3'>
        <h5>Libros publicados</h5>
        <div class="btn-group justify-content-center text-center" role="group" aria-label="Basic example">
                {foreach from=$generos item=genero}
                    <a class='btn btn-outline-primary btn-sm' href='genero/{$genero->nombre}'>{$genero->nombre}</a>
                {/foreach}
        </div>
    <a class='btn btn-outline-primary btn-sm float-right' href='formulario-libro/'>AGREGAR LIBRO +</a>
    </div>

    <div>
            <div>
            {foreach from=$libros item=libro}
            <div class="card d-inline-block ml-5 mt-5 mb-3" style="width: 14rem;">
                <img class="card-img-top" src="..." alt="Portada del libro">
                <div class="card-body">
                    <h6 class="card-title text-center">{$libro->titulo}</h6>
                    <p class="text-center text-success">${$libro->precio}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Escrito por {$libro->autor}</li>
                    <li class="list-group-item">Editorial {$libro->editorial}</li>
                </ul>
                <div class='actions text-center mt-2 mb-2'>
                    <a class='btn btn-warning btn-sm' href='formulario-libro/{$libro->id}'>EDITAR</a>
                    <a class='btn btn-danger btn-sm' href='eliminar-libro/{$libro->id}'>ELIMINAR</a>
                </div>
            </div>
            {/foreach}
        </div>

    </div>
</div>

{include 'templates/footer.tpl'}
