'use strict';

const app = new Vue({
    el: "#app",
    data: {
        reviews: [], // esto es como un assign de smarty
        error: null,
    }, 
});

document.addEventListener('DOMContentLoaded', e =>{
    loadReviews();

    document.querySelector('#review-form').addEventListener('submit', e => {
        e.preventDefault();
        
        addReview();
    });

});

// carga todas las reseñas de un libro
async function loadReviews(){
    let url = window.location.href; // obtiene la url
    let params = url.split('/'); // convierte la url en un arreglo, separando cada palabra con espacios donde hay '/'
    let book_id = params[params.length-1]; // toma el último item del array donde está la id del libro
    
    try{
        const response = await fetch(`api/reseñas/${book_id}`, {
            "method": "GET"
        });
        if(response.ok){
            const reviews = await response.json();
            console.log(reviews);
            app.reviews = reviews;
        } else{
            app.error = 'Aún no hay reseñas para este libro';
        }
    }
    catch(e){
        console.log(e);
    }
}
    async function addReview() {
        let url = window.location.href; // obtiene la url
        let params = url.split('/'); // convierte la url en un arreglo, separando cada palabra con espacios donde hay '/'
        let book_id = params[params.length-1]; // toma el último item del array donde está la id del libro

    // armo la review
        const reseña = {
            "id": '',
            "comentario": document.querySelector('textarea[name=comentario]').value,
            "valoracion": document.querySelector('input[name=valoracion]:checked').value,
            "id_libro": book_id,
        }

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
