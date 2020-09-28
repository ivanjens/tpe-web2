{include 'templates/header.tpl'}
 
    <h1 class='mt-4'>Acerca de</h1>
    
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt, asperiores nulla dolor at quos! Libero a quas placeat doloremque explicabo! Culpa, totam. Expedita recusandae fugiat consequatur laudantium amet alias?</p>
        
        <h2>Desarrolladores</h2>
        <ul>
            <li><a href="about/micaela">Micaela Cisneros</a></li>
            <li><a href="about/ivan">Ivan Jensen</a></li>
        </ul>
            <div class="btn-group justify-content-center" role="group" aria-label="Basic example">
            
            {if $name!= '' && $descripcion!='' }
            <h3>Autor: {$name}</h3>
            <p>Descripcion: {$descripcion}</p>
                
            {/if}
    </div>
    </body>
    </html>
