
    {include 'templates/header.tpl'}
        {if $libro == NULL}
            <form action="crear-libro" method="POST" class="my-4">
            {else}
                <form action="editar-libro/{$libro->id}" method="POST" class="my-4">
            
        {/if}
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Título</label>
                        {if $libro == NULL}
                            <input name="titulo" type="text" class="form-control">
                            {else}
                                <input name="titulo" type="text" class="form-control" value="{$libro->titulo}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        {if $libro == NULL}
                            <input name="autor" type="text" class="form-control">
                            {else}
                                <input name="autor" type="text" class="form-control" value="{$libro->autor}">
                        {/if} 
                    </div>
                    <div class="form-group">
                        <label>Editorial</label>
                        {if $libro == NULL}
                            <input name="editorial" type="text" class="form-control">
                            {else}
                                <input name="editorial" type="text" class="form-control" value="{$libro->editorial}">
                            
                        {/if}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Sinopsis</label>
                        {if $libro == NULL}
                            <textarea name="sinopsis" class="form-control col-12" rows="4"></textarea>
                            {else}
                            <textarea name="sinopsis" class="form-control col-12" rows="4">{$libro->sinopsis}</textarea>
                            
                        {/if}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Precio</label>
                        {if $libro == NULL}
                            <input name="precio" type="text" class="form-control">
                            {else}
                                <input name="precio" type="text" class="form-control" value="{$libro->precio}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        {if $libro == NULL}
                            <input name="stock" type="text" class="form-control">
                            {else}
                                <input name="stock" type="text" class="form-control" value="{$libro->stock}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Genero</label>
                        <select name="id_genero">
                        {foreach from=$generos item=genero} 
                            {if $libro->id_genero == $genero->id} {* Marca como selected el genero seteado del libro *}
                                <option selected value="{$genero->id}">{$genero->nombre}</option>
                                {else}
                                <option value="{$genero->id}">{$genero->nombre}</option>
                            {/if}
                        {/foreach}
                        </select>
                    </div>
                </div>
            </div>
            
            <div class='row justify-content-center mt-2'>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>

    {include 'templates/footer.tpl'}
