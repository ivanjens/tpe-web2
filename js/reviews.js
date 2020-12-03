'use strict';

const app = new Vue({
    el: "#app",
    data: {
        reviews: [], // esto es como un assign de smarty
        error: 'Aún no hay reseñas para este libro',
    }, 
    methods: {
        deleteReview: async function(reviewId){
                const reviews = await fetch(`api/reseñas/${reviewId}`, {
                    "method": "DELETE"
                });

                loadReviews();
        }
      }
});


document.addEventListener('DOMContentLoaded', e =>{
    initPage();
});

function initPage(){

    loadReviews();
    
    let formulario = document.querySelector('#div-form');
    let form_button = document.querySelector('#review-button'); 

    if(form_button != undefined){
    form_button.addEventListener('click', e => {
        e.preventDefault();
        let comentario = document.querySelector('textarea[name=comentario]').value;
        let valoracion = document.querySelector('input[name=valoracion]:checked');
        if(valoracion == null || comentario ==''){
            let container = document.querySelector("#mensaje");
            container.innerHTML = '<p class="alert alert-info mt-3 py-4 text-uppercase text-center col-8 offset-2" role="alert">Faltan datos obligatorios</p>'
        }
        else{
            valoracion = valoracion.value;
            addReview(valoracion, comentario);
        formulario.classList.add('is-hidden');
        }
    });
}


    async function addReview(valoracion, comentario) {
        const book_id = window.location.pathname.substr(window.location.pathname.lastIndexOf('/')+1);
        
            // armo la review
        const reseña = {
            "id": '',
            "comentario": comentario,
            "valoracion": valoracion,
            "id_libro": book_id,
        }

        if(!formulario.classList.contains('is-hidden')){
            try {
                const response = await fetch(`api/reseñas/${book_id}`, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify(reseña)
                });
                if(response.ok){
                    loadReviews();
                }
                //const r = await response.json();
                
            } catch(e) {
                console.log(e);
            }
        }

    }

}
    // carga todas las reseñas de un libro
    async function loadReviews(){

        const book_id = window.location.pathname.substr(window.location.pathname.lastIndexOf('/')+1);
        
        try{
            const response = await fetch(`api/reseñas/${book_id}`, {
                "method": "GET"
            });
            if(response.ok){
                const reviews = await response.json();
                console.log(reviews);
                app.reviews = reviews;
            }
        }
        catch(e){
            console.log(e);
        }
    }



