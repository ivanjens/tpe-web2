{if isset($smarty.session.ID_USER)}
<h6 class='text-uppercase'>Deja tu reseña</h6>
<form action="" method='POST'>
    <div class="form-group">
        <p class='text-center mb-0'>Puntuación</p>
        <div class='text-center'>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="valoracion" id="" value="1">
                <label class="form-check-label" for="">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="valoracion" id="" value="2">
                <label class="form-check-label" for="">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="valoracion" id="" value="3">
                <label class="form-check-label" for="">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="valoracion" id="" value="4">
                <label class="form-check-label" for="">4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="valoracion" id="" value="5">
                <label class="form-check-label" for="">5</label>
            </div>
        </div>
        
        <textarea placeholder="Escribe tu reseña aquí..." class="form-control mt-3 col-8 offset-2" id="" rows="5"></textarea>
    </div>
</form>
<div class='row justify-content-center mt-2 col-12'>
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
{/if}


