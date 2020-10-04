{include 'templates/header.tpl'}

<div class="card">
  <div class="card-header">
  <div class="card-body">
  <img class="card-img-top" src="..." alt="Portada del libro">
    <h1 class="card-title">{$libro->titulo}</h1>
    <p class="card-text">{$libro->sinopsis}</p>
    <h6 class="card-text">Autor: {$libro->autor}</h6>
    <h6 class="card-text">Editorial: {$libro->editorial}</h6>
    <h6 class="card-text">Precio: ${$libro->precio}</h6>
    <h6 class="card-text">Stock: {$libro->stock}</h6>
    <h6 class="card-text">Genero: {$libro->id_genero}</h6>
    <a href="{BASE_URL}home" class="btn btn-primary">VOLVER</a>
  </div>
</div>

{include 'templates/footer.tpl'}
