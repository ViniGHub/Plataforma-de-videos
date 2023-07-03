<?php
$nome = filter_input(INPUT_POST, 'user');
$senha = filter_input(INPUT_POST, 'senha');

header("location: /?sucesso=1&nome={$nome}&senha={$senha}");