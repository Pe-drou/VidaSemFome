<?php
// iniciar a sessão para poder destruí-la
session_start();

// destrói todas as informações da sessão atual, efetuando o logout do usuário
session_destroy();

// redireciona o usuário para a página de login após encerrar a sessão
header('Location: index.php');

// interrompe a execução do script para garantir que o redirecionamento ocorra imediatamente
exit();
?>