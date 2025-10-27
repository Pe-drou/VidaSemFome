<?php
session_start();

$mensagem_erro = "";

if ($_POST){
    // quando o usuário for cadastrar, pega todas as informações do formulário
    $nome_cadastro = $_POST['nome'];
    $email_cadastro = $_POST['email'];
    $telefone_cadastro = $_POST['telefone'];
    $senha_cadastro = $_POST['senha'];
    $senha_confirmar = $_POST['confirmar_senha'];

    // faz um cheque se ambas as senhas estão corretas
    if($senha_cadastro == $senha_confirmar){
        include'conn.php';

        // faz um cheque no banco de dados se os dados do usuário não estão cadastrados já previamente
        $sql = "SELECT nome, telefone FROM usuarios WHERE nome = '$nome_cadastro' OR telefone = '$telefone_cadastro'";
        $resultado = $conn->query($sql);
        $usuarios = $resultado->fetch_assoc();
        if($usuarios['nome'] !== $nome_cadastro && $usuarios['telefone'] !== $telefone_cadastro){
            // cadastra o usuário no banco de dados
            $stmt = "INSERT INTO usuarios(nome, email, telefone, senha) VALUES ('$nome_cadastro', '$email_cadastro', '$telefone_cadastro', '$senha_cadastro')";
            $conn->query($stmt);
            header('Location: login.php');
        } else {
            // se não, caso os dados estão já cadastrados, responde com uma mensagem erro
            $mensagem_erro = "Usuário já está cadastrado";
        }
    } else {
        // se as senhas estiverem incorretas, responde com uma mensagem de erro
        $mensagem_erro = "Confire se digitou a senha corretamente ou utilize uma senha mais memorável";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidaSemfome</title>

    <!-- Bootstrap e CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<body>
<header id="header">
    <a href="index.php" class="h-100 d-flex align-items-center justify-content-center">
        <img src="img/logo__2_-removebg-preview.png" alt="Logo empresa" style="height: 80%;">
    </a>
    <nav style="height: auto;">
        <a href="index.php" class="btn btn-custom-ter" >Voltar</a>
    </nav>
</header>
<div class="bg-custom-form" style="display: flex; align-items: center; justify-content: center;">
    <div class="form-container">
        <h1 class="mt-5">Cadastro</h1>
        <p>Já tem uma conta? <a href="login.php">Entre aqui!</a></p>
        <?php if($mensagem_erro): ?>
            <p style="width: 80; margin: 5px;"><?= htmlspecialchars($mensagem_erro) ?></p>
        <?php endif; ?>
        <form method="post" class="w-100 d-flex flex-column align-items-center">
            <input type="text" name="nome" id="nome" class="form-control mb-3" placeholder="Nome" required>
            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="E-mail" required>
            <input type="number" name="telefone" id="telefone" class="form-control mb-3" placeholder="Telefone" maxlength="11" required>
            <input type="password" name="senha" id="senha" class="form-control mb-3" placeholder="Senha" required>
            <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control mb-3" placeholder="Confirmar senha">
            <button type="submit" class="btn btn-custom-sec mb-5">Cadastrar</button>
        </form>
    </div>
</div>
<footer class="w-100 custom-footer d-flex align-items-center justify-content-center">
    <p style="font-size: 20px;">©2025 Vida  SemFome - Todas os direitos reservados</p>
</footer>
    
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</html>