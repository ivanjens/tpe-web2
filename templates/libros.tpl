{include 'templates/header.tpl'}

<div>
    
    <div>
        <form action="crear-libro" method="POST" class="my-4">
            <div class="row justify-content-center col-12">
                <div class="col-3">
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input name="autor" type="text" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label>Editorial</label>
                        <input name="editorial" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Sinopsis</label>
                        <textarea name="sinopsis" class="form-control col-12" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Precio</label>
                        <input name="precio" type="text" class="form-control col-6">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input name="stock" type="text" class="form-control col-6">
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
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>

    <h5>Libros publicados</h5>
    <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
            {foreach from=$generos item=genero}
                <a class='btn btn-outline-primary btn-sm' href='genero/{$genero->nombre}'>{$genero->nombre}</a>
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
                </ul>
                <div class='actions text-center mt-2 mb-2'>
                    <a class='btn btn-warning btn-sm' href='editar-libro/{$libro->id}'>EDITAR</a>
                    <a class='btn btn-danger btn-sm' href='eliminar-libro/{$libro->id}'>ELIMINAR</a>
                </div>
            </div>
            {/foreach}
        </div>

    </div>
</div>

{include 'templates/footer.tpl'}
