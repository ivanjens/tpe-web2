{include 'templates/header.tpl'}

<div class="card">
  <div class="card-header">
    <div class="card-body">
        <img class="card-img-top h-10" src="https://image.freepik.com/vector-gratis/boceto-realista-libro-abierto_125494-10.jpg" alt="Portada del libro">
        <h1 class="card-title">{$book->titulo}</h1>
        <p class="card-text">{$book->sinopsis}</p>
        <h6 class="card-text">Autor: {$book->autor}</h6>
        <h6 class="card-text">Editorial: {$book->editorial}</h6>
        <h6 class="card-text">Precio: ${$book->precio}</h6>
        <h6 class="card-text">Stock: {$book->stock}</h6>
        <h6 class="card-text">Genero: {$book->genero}</h6>
        <a href="{BASE_URL}home" class="btn btn-primary">VOLVER</a>
    </div>
</div>

{include 'templates/footer.tpl'}
