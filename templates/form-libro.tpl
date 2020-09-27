
    {include 'templates/header.tpl'}

        <form action="update-libro/{$libro[0]->id}" method="POST" class="my-4">
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control" value="{$libro[0]->titulo}">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input name="autor" type="text" class="form-control" value="{$libro[0]->autor}"> 
                    </div>
                    <div class="form-group">
                        <label>Editorial</label>
                        <input name="editorial" type="text" class="form-control" value="{$libro[0]->editorial}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Sinopsis</label>
                        <textarea name="sinopsis" class="form-control col-12" rows="4">{$libro[0]->sinopsis}</textarea>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Precio</label>
                        <input name="precio" type="text" class="form-control col-6" value="{$libro[0]->precio}">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input name="stock" type="text" class="form-control col-6" value="{$libro[0]->stock}">
                    </div>
                    <div class="form-group">
                        <label>Genero</label>
                            <select name="id_genero">
                            {foreach from=$generos item=genero}
                            <option value="{$genero->id}">{$genero->nombre}</option> 
                            {/foreach}
                            </select>
                    </div>
                </div>
            </div>
            
            <div class='row justify-content-center mt-2'>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

    {include 'templates/footer.tpl'}
