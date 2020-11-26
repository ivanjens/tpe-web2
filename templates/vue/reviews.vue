{literal}
<section id="app">
    <div v-if="reviews[0]">
        <div class='border border-light shadow p-3 mb-5 bg-white rounded py-4'>
            <div v-for="review in reviews" class="ml-3 mr-3 card text-center mb-5 mt-5 border border-dark">
                <div class="card-header py-0">
                    <p class='float-left mt-3'>Reseña de {{ review.nombre_usuario }} <span class='ml-2'>{{ review.valoracion }} <i class="fas fa-star punctuation-star"></i></span></p>
                    <p class='float-right mt-3'>{{ review.fecha }}</p>
                </div>
                <div class="card-body">
                    
                    <p class="card-text text-left text-secondary"> {{ review.comentario }}</p>
                </div>
                    {/literal}
                    {if isset($smarty.session.ADMIN) && $smarty.session.ADMIN == true}
                    <div class='mt-1 mr-2 mb-2 text-right'>
                        <button type="submit" ><img src='https://icongr.am/octicons/shield-x.svg?size=30&color=c92626'/></button>
                    </div>
                    {/if}
                    {literal}
            </div>
        </div>
    </div>
    <div v-else class="alert alert-info mt-3 py-4 text-uppercase text-center col-8 offset-2" role="alert">
        {{ error }}
    </div>
</section>
{/literal}