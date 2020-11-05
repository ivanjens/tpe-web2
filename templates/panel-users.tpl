{include 'templates/header.tpl'}

    <main class="container"> <!-- empieza contenido principal -->

        {if !isset($smarty.session.ADMIN) || $smarty.session.ADMIN == false}
        <div class='alert alert-danger mt-3 mb-5 text-center col-6 offset-3'>
            <p class=''>NO ESTÁS LOGEADO O NO TIENES PERMISOS</p>
            <a class='btn btn-danger btn-sm text-uppercase m-2' href=''>Volver al inicio</a>
        </div>
        {/if}

        {if isset($smarty.session.ADMIN) && $smarty.session.ADMIN == true}
        <h4 class='text-uppercase mt-3 mb-5'>Usuarios</h4>
        <div>
            <table class="table">
                <thead>
                    <tr class='text-uppercase text-center'>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Admin</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$users item=user}
                        <tr class='text-center'>
                            <td scope="row">{$user->nombre}</td>
                            <td>{$user->email}</td>
                            {if $user->permisos == 0}
                            <td>NO</td>
                            <td>
                                <a class = 'mr-2' href='eliminar-usuario/{$user->id}'><img src='https://icongr.am/material/account-remove.svg?size=25&color=d05858'/></a>
                                <a href='permisos-usuario/{$user->id}'><img src='https://icongr.am/material/account-star.svg?size=25&color=d058b0'/></a>
                            </td>
                            {else}
                                <td>SI</td>
                            {/if}
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>

        {/if}
        
    </main>

{include 'templates/footer.tpl'}
