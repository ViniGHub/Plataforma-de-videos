<?php

/**
 * @var League\Plates\Template\Template $this
 */

echo $this->layout('layouts/layout');
?>

<main class="container" style="overflow-y: hidden;">

<h1></h1>

    <form action="./change-login" class="container__formulario" method="post" id="form_mudarLog">

        <h2 style="font-size: 25px; margin-bottom: 500px;" class="formulario__titulo">Login atual</h2>

        <div style="z-index: 1;" class="container__loginChange" id="form__oldU">

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario_att">Usuario atual</label>
                <input style="background: var(--azul-claro);" name="email_atual" class="campo__escrita campo__att" required placeholder="Digite seu usuário" id='usuario_att' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha_att">Senha atual</label>
                <input style="background: var(--azul-claro);" type="password" name="password_atual" class="campo__escrita campo__att" required placeholder="Digite sua senha" id='senha_att' />
            </div>

            <div style="display: flex; align-items: center; justify-content: center;">
<<<<<<< HEAD
                <input class="formulario__botao" type="button" value="Enviar" onclick="checkInput(<?= $user->email ?>, <?= $user->password ?>)"/>
=======
                <input class="formulario__botao" type="button" value="Enviar" onclick="checkInput('<?= $user->email ?>', '<?= $user->password ?>')" />
>>>>>>> dev
            </div>

        </div>

        <div class="container__loginChange" id="form__newU">

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario_new">Novo usuario</label>
                <input style="background: var(--azul-claro);" name="new_email" class="campo__escrita" required placeholder="Digite seu usuário" id='usuario_new' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha_new1">Nova senha</label>
                <input style="background: var(--azul-claro);" type="password" name="new_password1" class="campo__escrita" required placeholder="Digite sua senha" id='senha_new1' />
            </div>

            <div style="display: flex; align-items: center; justify-content: center;">
                <input class="formulario__botao" type="submit" value="Confirmar" />
            </div>
        </div>

    </form>

</main>

<script src="/js/form.js"></script>