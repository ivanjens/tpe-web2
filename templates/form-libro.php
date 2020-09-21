<!-- formulario añadir libro -->
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
                <label>ID Genero</label>
                <input name="id_genero" type="text" class="form-control col-6">
            </div>
        </div>
    </div>
    
    <div class='row justify-content-center mt-2'>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>
