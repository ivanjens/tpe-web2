{include 'templates/header.tpl'}
    <div>
        <form action="crear-genero" method="POST" class="my-4">
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Nombre del genero</label>
                        <input name="nombre" type="text" class="form-control">
                    </div>
                </div>
            <div class='row justify-content-center mt-2'>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <div>
        <ul class="list-group">
            {foreach from=$generos item=genero}
            <li class="list-group-item">{$genero->nombre}<a class='btn btn-warning btn-sm' href='editar-genero/{$genero->id}'>EDITAR</a><a class='btn btn-danger btn-sm' href='eliminar-genero/{$genero->id}'>ELIMINAR</a></li>
            {/foreach}
        </ul>
    </div>


{include 'templates/footer.tpl'}
