<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conn.php';

// Verifica login
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Normaliza variáveis
    $data = $_POST['schedule'];
    $doacao = $_POST['donation'];
    $cep = $_POST['CEP-donate'];
    $rua = $_POST['street-donate'];
    $telefone = $_POST['phone-donate'];
    $pontoref = $_POST['refpoint-donate'];
    $usuario = $_SESSION['usuario']['id'];

    // Prepara a query segura
    $stmt = $conn->prepare("INSERT INTO pedidos (usuario_id, diaentrega, cep, rua, telefone, pontoref, doacao)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $usuario, $data, $cep, $rua, $telefone, $pontoref, $doacao);

    if ($stmt->execute()) {
        header('Location: thanks.php');
        exit();
    } else {
        echo "Erro ao salvar pedido: " . $stmt->error;
    }

    $stmt->close();
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
<body class="bg-custom-log" style="overflow: hidden;">
<header id="header">
    <a href="index.php" class="h-100 d-flex align-items-center justify-content-center">
        <img src="img/logo__2_-removebg-preview.png" alt="Logo empresa" style="height: 80%;">
    </a>
    <nav style="height: auto;">
        <a href="index.php" class="btn btn-custom-ter" >Voltar</a>
    </nav>
</header>
<section class="d-flex align-items-center justify-content-center pt-1" style="width: 100vw;">
    <div style="padding-left: 5vw;">
        <div class="row w-100">
            <div class="col-12 col-lg-7 my-5">
                <h5>Por que ajudar?</h5>
                <p>Além de transformar vidas com a doação de alimentos, sua empresa pode se destacar como socialmente responsável, fortalecendo sua imagem junto aos clientes e comunidade.<br>E mais:</p>
                <ul>
                    <li>Dependendo da forma da doação, é possível ter benefícios fiscais através de programas oficiais de incentivo.</li>
                    <li>Emitimos certificados de parceria e damos visibilidade às empresas apoiadoras.</li>
                    <li>Sua marca passa a ser reconhecida como uma Empresa Amiga da Comunidade.</li>
                </ul>
                <div class="mb-3">
                    <span style="font-size: 1.1em;" class="fw-bold">Perfil: <?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></span>
                    <p class="fw-semibold">Histórico de doações</p>
                    <span class="user-stats">0</span>
                    <p class="fw-semibold">Data de entrega:</p>
                    <span class="user-stats">XX/XX/XXXX</span>
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-5">
                <form method="post">
                    <label for="schedule" class="form-label">Agendar Doação</label>
                    <input type="date" name="schedule" id="schedule" class="form-control" placeholder="XX/XX/XXXX" required >
                    <label for="donation" class="form-label">O que deseja doar</label>
                    <input type="text" name="donation" id="donation" class="form-control" required>
                    <p class="fs-4">Endereço:</p>
                    <div class="row row-cols-2">
                        <div class="col mb-3">
                            <label for="CEP-donate" class="form-label">CEP</label>
                            <input type="text" maxlength="8" name="CEP-donate" id="CEP-donate" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="street-donate" class="form-label">Rua</label>
                            <input type="text" name="street-donate" id="street-donate" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="phone-donate" class="form-label">Número</label>
                            <input type="text" name="phone-donate" id="phone-donate" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="refpoint-donate" class="form-label">Ponto de referência</label>
                            <input type="text" name="refpoint-donate" id="refpoint-donate" class="form-control">
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-custom-sec">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- SCRIPT DE BUSCA DE CEP -->
<script>
document.getElementById('CEP-donate').addEventListener('blur', function() {
    let cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('street-donate').value = data.logradouro || '';
                } else {
                    alert('CEP não encontrado!');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
                alert('Erro ao buscar CEP!');
            });
    } else if (cep.length > 0) {
        alert('CEP inválido! Digite apenas 8 números.');
    }
});
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>