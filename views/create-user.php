<?php 
/** @var League\Plates\Template\Template $this */

echo $this->layout('/layouts/layout');
?>

<main class="container">

    <form action="./login" class="container__formulario" method="post">
        <h2 class="formulario__titulo">Criar Usúario</h3>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario">Email</label>
                <input name="email" class="campo__escrita" required placeholder="Digite seu usuário" id='usuario' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha">Senha</label>
                <input type="password" name="password" class="campo__escrita" required placeholder="Digite sua senha" id='senha' />
            </div>

            <p class="campo__etiqueta">Ja tem uma conta? <a class="link__form" href="/log">Login</a></p>

            <input class="formulario__botao" type="submit" value="Entrar" />
    </form>

</main>