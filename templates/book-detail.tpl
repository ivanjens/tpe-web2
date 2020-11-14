{include 'templates/header.tpl'}

  <main class="container"> <!-- empieza contenido principal -->

    <div class="card mt-4">
      <div class="card-header">
        <div class="card-body">
          <div class='col-12 row mb-3'>
            <img class="card-img-top col-4 mb-2" src="https://image.freepik.com/vector-gratis/boceto-realista-libro-abierto_125494-10.jpg" alt="Portada del libro">
            <div class='col-4'>
              <h1 class="card-title text-uppercase">{$book->titulo}</h1>
              <h6 class="card-text">Escrito por {$book->autor}</h6>
              <h6 class="card-text">Editorial {$book->editorial}</h6>
              <h6 class="card-text">{$book->genero}</h6>
            </div>
            <div class='col-4 text-right'>
              <h6 class="card-text">Stock: {$book->stock}</h6>
            </div>
          </div>
          <div class='col-12 border-top border-dark'>
            <div class="shadow-sm p-3 mb-5 mt-3 bg-white rounded">
              <h5 class='text-center mb-4'><u>SINOPSIS</u></h5>
              <p class="card-text">{$book->sinopsis}</p>
            </div>
            <div class='text-center'>
              <a href="comprar/{$book->id}" class="btn btn-success">COMPRAR A ${$book->precio}</a>
              <a href="{BASE_URL}home" class="btn btn-primary">VOLVER</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class='mt-5'>
      {include 'templates/review-box.tpl'}
    </div>

    

  </main>
  <section class='ml-5 mr-5'>
    <h5 class='text-uppercase mt-5 mb-3'>Reseñas</h5>
    <div>
      {include file='vue/reviews.vue'}
    </div>
  </section>

    
  <script src="js/reviews.js"></script>

{include 'templates/footer.tpl'}
