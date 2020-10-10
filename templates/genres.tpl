{include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->

        <div>
            <div class='mt-3'>
                <h5>Generos</h5>
                <a class='btn btn-outline-success btn-sm float-right' href='formulario-genero/'>AGREGAR GENERO +</a>
            </div>

            <div class='col-4 mt-3'>
                <ul class='list-group'>
                    {foreach from=$genres item=genre}
                        <li class="list-group-item">{$genre->nombre}
                            <a class='btn btn-danger btn-sm float-right ml-1' href='eliminar-genero/{$genre->id}'>ELIMINAR</a>
                            <a class='btn btn-warning btn-sm float-right' href='formulario-genero/{$genre->id}'>EDITAR</a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>

    </main>

{include 'templates/footer.tpl'}
