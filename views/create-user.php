<?php

/** @var League\Plates\Template\Template $this */

use League\Plates\Extension\Asset;

echo $this->layout('/layouts/layout');
?>

<main class="container">

    <form action="./create-login" class="container__formulario" method="post" id="formCr">
        <h2 class="formulario__titulo">Criar Usúario</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="usuario">Usuario</label>
            <input name="email" class="campo__escrita" placeholder="Digite seu usuário" id="usuario" oninput="checkUser(this)" value="<?= $email_cr ?>"/>
        </div>

        <div class="formulario__campo">
            <label class="campo__etiqueta" for="senha">Senha</label>
            <input type="password" name="password" class="campo__escrita" placeholder="Digite sua senha" id="senha" oninput="checkPass(this)" value="<?= $pass_cr ?>"/>
        </div>

        <div style="width: 100%; color:red; display: flex; ">
            <ul class="campo__requisitos">
                <li>
                    <i class="fa-solid fa-xmark" onmouseover="shake(this)" id="email3_ico" onmouseout="removeShake(this)"></i>
                    <p class="texto__requisitos" id="email3">Usúario com pelo menos 3 carácteres.</p>
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

        <p class="campo__etiqueta">Ja tem uma conta? <a class="link__form" href="/log">Login</a></p>

        <input class="formulario__botao" type="submit" value="Entrar" id="btnForm" />
    </form>

</main>

<script src="/js/create-user.js"></script>