{include 'templates/header.tpl'}

    <div>
        <div class='mt-3'>
            <h5>Generos</h5>
            <a class='btn btn-outline-primary btn-sm float-right' href='formulario-genero/'>AGREGAR GENERO +</a>
        </div>

        <div class='col-4 mt-3'>
            <ul class='list-group'>
                {foreach from=$generos item=genero}
                    <li class="list-group-item">{$genero->nombre}
                        <a class='btn btn-danger btn-sm float-right ml-1' href='eliminar-genero/{$genero->id}'>ELIMINAR</a>
                        <a class='btn btn-warning btn-sm float-right' href='formulario-genero/{$genero->id}'>EDITAR</a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

{include 'templates/footer.tpl'}
