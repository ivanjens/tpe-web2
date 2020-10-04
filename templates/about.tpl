{include 'templates/header.tpl'}
 
    <h1 class='text-center mt-4'>Acerca de</h1>
    
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt, asperiores nulla dolor at quos! Libero a quas placeat doloremque explicabo! Culpa, totam. Expedita recusandae fugiat consequatur laudantium amet alias?</p>
        
        <h2>Desarrolladores</h2>
        <ul>
            <li><a href="about/micaela">Micaela Cisneros</a></li>
            <li><a href="about/ivan">Ivan Jensen</a></li>
        </ul>
    <div class="text-center">
            {if $name!= '' && $descripcion!='' }
            <h5>Autor: {$name}</h5>
            <p>Descripcion: {$descripcion}</p>
                
            {/if}
    </div>
{include 'templates/footer.tpl'}
