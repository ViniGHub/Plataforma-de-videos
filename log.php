<?php
echo $nome = filter_input(INPUT_POST, 'user');

header("location: /?sucesso=1&nome={$nome}");