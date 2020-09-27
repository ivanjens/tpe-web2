
{include 'templates/header.tpl'}

<!-- formulario añadir libro -->
        <form action="editar-genero/{$genero[0]->id}" method="POST" class="my-4">
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Nombre del genero</label>
                        <input name="nombre" type="text" class="form-control" value="{$genero[0]->nombre}">
                    </div>
                </div>
            <div class='row justify-content-center mt-2'>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

{include 'templates/footer.tpl'}
