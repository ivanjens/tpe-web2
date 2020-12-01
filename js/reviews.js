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
    console.log(form_button);
    if(form_button != undefined){
    form_button.addEventListener('click', e => {
        e.preventDefault();
        addReview();
        formulario.classList.add('is-hidden');
    });
}


    async function addReview() {
        const book_id = window.location.pathname.substr(window.location.pathname.lastIndexOf('/')+1);

    // armo la review
        const reseña = {
            "id": '',
            "comentario": document.querySelector('textarea[name=comentario]').value,
            "valoracion": document.querySelector('input[name=valoracion]:checked').value,
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



