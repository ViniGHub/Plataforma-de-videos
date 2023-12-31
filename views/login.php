<?php
/** @var \League\Plates\Template\Template $this */
echo $this->layout('/layouts/layout'); ?>
<main class="container">

    <form action="./log" class="container__formulario" method="post">
        <h2 class="formulario__titulo">Efetue login</h2>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario">Usuario</label>
                <input name="email" class="campo__escrita" required placeholder="Digite seu usuário" id='usuario' value="<?= $email_ch ?>"/>
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha">Senha</label>
                <input type="password" name="password" class="campo__escrita" required placeholder="Digite sua senha" id='senha' value="<?= $pass_ch ?>"/>
            </div>

            <p class="campo__etiqueta">Ainda não tem uma conta? <a class="link__form" href="/create-login">Criar conta</a></p>

            <input class="formulario__botao" type="submit" value="Entrar" />
    </form>

</main>