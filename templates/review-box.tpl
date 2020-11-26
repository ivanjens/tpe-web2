{if (isset($smarty.session.ID_USER) && ($smarty.session.ADMIN == false))}
<h6 class='text-uppercase'>Deja tu reseña</h6>
<form id="review-form" action="" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="form-group">
        <p class='text-center mb-0'>Puntuación</p>
        <div class='text-center'>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="valoracion" name="valoracion" value="1">
               <label class="form-check-label" >1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="valoracion" name="valoracion" value="2">
                <label class="form-check-label" >2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="valoracion" name="valoracion" value="3">
                <label class="form-check-label" >3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="valoracion" name="valoracion" value="4">
                <label class="form-check-label" >4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="valoracion" name="valoracion" value="5">
                <label class="form-check-label" >5</label>
            </div>
        </div>
        
        <textarea placeholder="Escribe tu reseña aquí..." class="form-control mt-3 col-8 offset-2" name="comentario" id="comentario" rows="5"></textarea>
    </div>
    <div class='row justify-content-center mt-2 col-12'>
    <button type="submit"  id='review-button' class="btn btn-primary">Enviar</button>
    </div>
</form>

{/if}


