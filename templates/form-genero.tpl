
{include 'templates/header.tpl'}

<!-- formulario añadir libro -->
        {if $genero == NULL}
            <form action="crear-genero" method="POST" class="my-4">
            {else}
                <form action="editar-genero/{$genero->id}" method="POST" class="my-4">
            
        {/if}
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Nombre del genero</label>
                        {if $genero == NULL}
                            <input name="nombre" type="text" class="form-control">
                            {else}
                                <input name="nombre" type="text" class="form-control" value="{$genero->nombre}">
                            
                        {/if}
                    </div>
                </div>
            <div class='row justify-content-center mt-2 col-12'>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

{include 'templates/footer.tpl'}
