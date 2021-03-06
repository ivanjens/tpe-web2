<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>    
    <script src="https://kit.fontawesome.com/d058be177b.js" crossorigin="anonymous"></script>

</head>
<body>

      <header>
        
          <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
              <a class="navbar-brand" href="#">Librería</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="">INICIO</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="contacto">CONTACTO</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="about/">ABOUT</a>
                  </li>
                  {if isset($smarty.session.ADMIN) && $smarty.session.ADMIN == true}
                    <li class="nav-item active">
                      <a class="nav-link" href="admin">ADMIN</a>
                    </li>
                  {/if}
                </ul>
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
              {if isset($smarty.session.NAME_USER)}
                  <li class="nav-item active">
                    <p class='text-light mt-1 mr-3'>Hola, {$smarty.session.NAME_USER}</p>
                  </li>
                  <li class="nav-item active">
                    <a href='logout' class="btn btn-outline-success">LOGOUT</a>
                  </li>
                {else}
                  <li class="nav-item active">
                    <a href='login' class="btn btn-outline-success mr-1">LOGIN</a>
                  </li>
                  <li class="nav-item active">
                    <a href='registro' class="btn btn-outline-success">REGISTRARSE</a>
                  </li>
              {/if}
                </ul>
              </div>
            </nav>
            <img class='img-fluid' id='banner' src='images/banner.png' alt='Banner'/>
      </header>

      

    