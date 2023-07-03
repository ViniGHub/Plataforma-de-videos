<?php require_once './pages/cabecalho/inicio-html.php'; ?>
    <main class="container">

        <form action="./log" class="container__formulario" method="post">
            <h2 class="formulario__titulo">Efetue login</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="usuario">Usuário</label>
                    <input name="user" class="campo__escrita" required
                        placeholder="Digite seu usuário" id='usuario' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="senha">Senha</label>
                    <input type="password" name="senha" class="campo__escrita" required placeholder="Digite sua senha"
                        id='senha' />
                </div>

                <input class="formulario__botao" type="submit" value="Entrar" />
        </form>

    </main>
<?php require_once './pages/cabecalho/fim-html.php'; ?>