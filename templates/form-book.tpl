
{include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->
        {if $book == NULL}
            <form action="crear-libro" method="POST" class="my-4" enctype='multipart/form-data'>
            {else}
                <form action="editar-libro/{$book->id}" method="POST" class="my-4" enctype='multipart/form-data'>
            
        {/if}
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Título</label>
                        {if $book == NULL}
                            <input name="titulo" type="text" class="form-control">
                            {else}
                                <input name="titulo" type="text" class="form-control" value="{$book->titulo}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        {if $book == NULL}
                            <input name="autor" type="text" class="form-control">
                            {else}
                                <input name="autor" type="text" class="form-control" value="{$book->autor}">
                        {/if} 
                    </div>
                    <div class="form-group">
                        <label>Editorial</label>
                        {if $book == NULL}
                            <input name="editorial" type="text" class="form-control">
                            {else}
                                <input name="editorial" type="text" class="form-control" value="{$book->editorial}">
                            
                        {/if}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Sinopsis</label>
                        {if $book == NULL}
                            <textarea name="sinopsis" class="form-control col-12" rows="8"></textarea>
                            {else}
                            <textarea name="sinopsis" class="form-control col-12" rows="8">{$book->sinopsis}</textarea>
                        {/if}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Precio</label>
                        {if $book == NULL}
                            <input name="precio" type="text" class="form-control">
                            {else}
                                <input name="precio" type="text" class="form-control" value="{$book->precio}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        {if $book == NULL}
                            <input name="stock" type="text" class="form-control">
                            {else}
                                <input name="stock" type="text" class="form-control" value="{$book->stock}">
                            
                        {/if}
                    </div>
                    <div class="form-group">
                        <label>Genero</label>
                        <select name="id_genero">
                        {foreach from=$genres item=genre} 
                            {if $book->id_genero == $genre->id} {* Marca como selected el genero seteado del libro *}
                                <option selected value="{$genre->id}">{$genre->nombre}</option>
                                {else}
                                <option value="{$genre->id}">{$genre->nombre}</option>
                            {/if}
                        {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Portada</label>
                        <input type="file" name="input_name" id="imageToUpload">
                    </div>
                </div>
            </div>
            
            <div class='row justify-content-center mt-2'>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </main>

    {include 'templates/footer.tpl'}
