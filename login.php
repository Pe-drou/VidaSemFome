<?php
session_start();

// Variável para mensagem de erro
$mensagem_erro = "";

// Se o usuário clicou em "Entrar"
if ($_POST){
    // Conectar no banco
    include 'conn.php';

    // Pegar o que o usuário digitou
    $identificador_digitado = $_POST['identificador'];
    $senha_digitada = $_POST['senha'];

    // Procurar o usuário no banco
    $sql = "SELECT * FROM usuarios WHERE nome='$identificador_digitado' AND senha='$senha_digitada'";
    $resultado = $conn->query($sql);

    // Se encontrou o usuário
    if ($resultado->num_rows > 0 ){
        $dados_usuario = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $dados_usuario;
        header('Location: index.php');
        exit();
    } else {
        $mensagem_erro = "Usuário ou senha inválidos";
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
</body>
<header id="header">
    <a href="index.php" class="h-100 d-flex align-items-center justify-content-center">
        <img src="img/logo__2_-removebg-preview.png" alt="Logo empresa" style="height: 80%;">
    </a>
    <nav style="height: auto;">
        <a href="index.php" class="btn btn-custom-ter">Voltar</a>
    </nav>
</header>
<div class="bg-custom-form" style="display: flex; align-items: center; justify-content: center;">
    <div class="form-container">
        <h1 class="mt-5">Login</h1>
        <p>Ainda não tem uma conta? <a href="cadastro.php">Registre-se já!</a></p>
        <?php if($mensagem_erro): ?>
            <p style="width: 80; margin: 5px;"><?= htmlspecialchars($mensagem_erro) ?></p>
        <?php endif; ?>
        <form method="post" class="w-100 d-flex flex-column align-items-center">
            <input type="text" name="identificador" id="identificador" class="form-control mb-3" placeholder="Nome ou Telefone">
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
            <div class="form-text mb-3"><a href="#">Esqueceu sua senha?</a></div>
            <button type="submit" class="btn btn-custom-pri mb-5">Entrar</button>
        </form>
    </div>
</div>
<footer class="w-100 custom-footer d-flex align-items-center justify-content-center">
    <p style="font-size: 20px;">©2025 Vida  SemFome - Todas os direitos reservados</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>