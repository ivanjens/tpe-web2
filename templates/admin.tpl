<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    {include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->
        <div>
            <a class='btn btn-outline-primary btn-sm' href='genero/crear-libro'>AÑADIR LIBRO</a>
            <a class='btn btn-outline-primary btn-sm' href='genero/crear-genero'>AÑADIR GENERO</a>
        </div>
        <div>
            <h5>Libros publicados</h5>
            <div class="btn-group" role="group" aria-label="Basic example">
                {foreach from=$generos item=genero}
                <a class='btn btn-primary btn-sm' href='genero/{$genero->id}'>{$genero->nombre}</a>
                {/foreach}
            </div>
            <div>
                 <div>
                    {foreach from=$libros item=libro}
                    <div class="card d-inline-block ml-5 mt-5" style="width: 14rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title text-center">{$libro->titulo}</h6>
                            <p class="text-center text-success">${$libro->precio}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Escrito por {$libro->autor}</li>
                            <li class="list-group-item">Editorial {$libro->editorial}</li>
                        </ul>
                        <div class='actions text-center mt-2 mb-2'>
                            <a class='btn btn-warning btn-sm' href='editar/{$libro->id}'>EDITAR</a>
                            <a class='btn btn-danger btn-sm' href='eliminar/{$libro->id}'>ELIMINAR</a>
                        </div>
                    </div>
                    {/foreach}
                </div>

            </div>
        </div>
    </main>

{include 'templates/footer.tpl'}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>