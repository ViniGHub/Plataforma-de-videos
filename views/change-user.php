<?php

/**
 * @var League\Plates\Template\Template $this
 */

use Alura\Mvc\Helper\EncryptingPass;

echo $this->layout('layouts/layout');
?>

<main class="container">

    <h1></h1>

    <form action="./change-login" class="container__formulario" method="post" id="form_userVal">

        <h2 style="font-size: 25px; margin-bottom: 500px; position:absolute;" class="formulario__titulo">Login atual</h2>

        <div style="z-index: 1;" class="container__loginChange" id="form__oldU">

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario_att">Usuario atual</label>
                <input style="background: var(--azul-claro);" name="email_atual" class="campo__escrita campo__att" placeholder="Digite seu usuário" id='usuario_att' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha_att">Senha atual</label>
                <input style="background: var(--azul-claro);" type="password" name="password_atual" class="campo__escrita campo__att" placeholder="Digite sua senha" id='senha_att' />
            </div>

            <div style="display: flex; align-items: center; justify-content: center;">
                <input class="formulario__botao" type="button" value="Enviar" onclick="checkInputAtt('<?= $_SESSION['email'] ?>', '<?= EncryptingPass::decrypt($_SESSION['password'], 'VibePass') ?>')" id="btn__anim" />
            </div>

        </div>

        <div class="container__loginChange" id="form__newU">

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="usuario">Novo usuario</label>
                <input style="background: var(--azul-claro);" name="new_email" class="campo__escrita" oninput="checkUser(this)" placeholder="Digite seu usuário" id='usuario' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha">Nova senha</label>
                <input style="background: var(--azul-claro);" type="password" name="new_password1" class="campo__escrita" oninput="checkPass(this)" placeholder="Digite sua senha" id='senha' />
            </div>

            <div style="display: flex; align-items: center; justify-content: center;">
                <input class="formulario__botao" type="button" value="Confirmar" id="btnForm" />
            </div>
        </div>

        <div style="width: 100%; color:red; display: flex;" id="cmp_req">
            <ul class="campo__requisitos">
                <li>
                    <i class="fa-solid fa-xmark" onmouseover="shake(this)" id="email3_ico" onmouseout="removeShake(this)"></i>
                    <p class="texto__requisitos" id="email3">Usúario com pelo menos 3 carácteres.</p>
                </li>
                <li>
                    <i class="fa-solid fa-xmark" onmouseover="shake(this)" id="emailEsp_ico" onmouseout="removeShake(this)"></i>
                    <p class="texto__requisitos" id="emailEsp">Usúario sem espaço.</p>
                </li>
                <li>
                    <i class="fa-solid fa-xmark" onmouseover="shake(this)" id="pass3_ico" onmouseout="removeShake(this)"></i>
                    <p class="texto__requisitos" id="pass3">Senha com pelo menos 3 carácteres.</p>
                </li>
                <li>
                    <i class="fa-solid fa-xmark" onmouseover="shake(this)" id="passlay_ico" onmouseout="removeShake(this)"></i>
                    <p class="texto__requisitos" id="passlay">Tem que ter 'lay' na senha</p>
                </li>
            </ul>
        </div>

    </form>

</main>

<script src="/js/anim-form.js"></script>

<script src="/js/check-user.js"></script>