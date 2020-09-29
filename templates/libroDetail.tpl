{include 'templates/header.tpl'}

<body>


        <h1>{$libro->titulo}</h1>
        <p>{$libro->sinopsis}</p>
        <p>Autor: {$libro->autor}</p>
        <p>Editorial: {$libro->editorial}</p>
        <p>Precio: ${$libro->precio}</p>
        <p>Stock: {$libro->stock}</p>
        <p>Genero: {$libro->id_genero}</p>



        <a href="{BASE_URL}home">volver</a>


</body>
</html>