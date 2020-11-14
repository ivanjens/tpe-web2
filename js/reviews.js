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