<?php
session_start();
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
    <!-- HEADER DO SITE -->
    <header id="header">
        <a href="index.php" class="h-100 d-flex align-items-center justify-content-center" style="z-index: 12;">
            <img src="img/logo__2_-removebg-preview.png" alt="Logo empresa" style="height: 80%;">
        </a>
        <nav>
            <ul class="d-flex justify-content-between navlist">
                <li><a href="#historia" class="btn text-light">Nossa História</a></li>
                <li><a href="#impacto" class="btn text-light">Nosso Impacto</a></li>
                <li><a href="#doar" class="btn text-light">Como doar</a></li>
                <?php if($_SESSION['usuario']): ?>
                    <li>
                        <div class="dropstart">
                            <button class="btn btn-custom-pri dropdown-toggle" style="font-weight: bold; color: #eee !important;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></button>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                <?php else: ?>
                    <li><a href="cadastro.php" class="btn btn-custom-pri">Registre hoje!</a></li>
                <?php endif; ?>
            </ul>
            <button class="bi bi-list" id="mobile-menu" style="z-index: 12;"></button>
        </nav>
    </header>
    <!-- BANNER MAIN -->
    <main style="height: 70vh;">
        <div class="card h-100" id="main-banner">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h1 class="card-title" style="font-weight: bold;">Ajude famílias com cestas básicas!</h1>
                <p style="font-size: 24px; font-weight: bold;">Sua contribuição faz a diferença. Juntos podemos alimentar a quem precisa.</p>
                <a href="request.php" class="btn btn-custom-pri">Doe já!</a>
                <div style="height: 30%;"></div>
            </div>
        </div>
    </main>
    <div style="height: 15px !important;" class="break-line"></div>
    <!-- SEÇÃO DE CONTRIBUIÇÕES -->
    <section id="impacto" class="d-flex flex-column align-items-center justify-content-around pt-5 bg-custom-sec"> 
        <h5 class="fs-3 mb-3">Nosso impacto</h5>
        <div class="w-100 px-5 mb-3 d-flex flex-row align-items-center justify-content-between gap-3">
            <div class="card text-center w-25">
                <i class="bi bi-geo-fill card-icon"></i>
                <div class="card-body">
                    <h5 class="card-title">0</h5>
                    <p class="card-text">Pontos ativos</p>
                </div>
            </div>
            <div class="card text-center w-25">
                <i class="bi bi-people-fill card-icon"></i>
                <div class="card-body">
                    <h5 class="card-title">-1</h5>
                    <p class="card-text">Famílias ajudadas</p>
                </div>
            </div>
            <div class="card text-center w-25">
                <i class="bi bi-box-seam-fill card-icon"></i>
                <div class="card-body">
                    <h5 class="card-title">+0</h5>
                    <p class="card-text">Cestas doadas</p>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between w-75">
            <p id="contrib">
                <strong>Quero contribuir uma cesta</strong><br>
                Cadastre-se para poder contribuir à uma cesta básica<br>
                Clique no botão "Doe Já" e cadastre sua doação
            </p>
            <a href="request.php" class="btn btn-custom-sec px-5">Doe já</a>
        </div>
    </section>
    <div style="height: 15px !important;" class="break-line"></div>
    <!-- SEÇÃO NOSSA HISTÓRIA -->
    <section id="historia" class="d-flex flex-column align-items-center justify-content-around pt-5 bg-custom-pri">
        <h5 class="fs-3">Nossa História</h5>
            <div class="row row-cols 2 w-75 mt-5 text-list">
                <div class="col">
                    <p>
                        Nossa jornada começou com um simples gesto: doar alimento a quem mais precisava.<br> O que era pequeno cresceu, ganhou força e hoje é um movimento de solidariedade que alimenta famílias e espalha esperança. <br>Mas nossa luta não para. Estamos trabalhando para que empresários e comerciantes também possam ajudar com ainda mais impacto: unindo a generosidade à possibilidade de desconto tributário, criando um ciclo onde todos ganham — famílias, empresas e sociedade. Cada cesta básica entregue é uma vitória contra a fome. Cada empresa parceira, uma prova de que juntos somos mais fortes.
                    </p>
                </div>
                <div class="col">
                    <img src="img/banner.jpg" alt="Imagem" class="w-100" style="border-radius: 5%;">
                </div>
            </div>
    </section>
    <div style="height: 15px !important;" class="break-line"></div>
    <!-- SEÇÃO PONTOS DE REFERÊNCIA -->
    <section id="pontos" class="d-flex flex-column align-items-center justify-content-around pt-5 bg-custom-sec">
        <h5 class="fs-4">Pontos de Entrega</h5>
        <p>Encontre nossos pontos de coleta mais próximos de você!</p>
        <div class="d-flex flex-column align-items-start justify-content-center p-3 mb-3" style="width: 80vw; background-color: var(--light-color); border-radius: 15px;">
            <p class="fs-4 m-0">Centro Comunitário Esperança</p>
            <p>Endereço: R. das FLores, 123</p>
            <a href="google.com/maps/search/?api=1&query=-23.55052,-46.633308">Abrir no Google Maps</a>
        </div>
        <div class="d-flex flex-column align-items-start justify-content-center p-3 mb-3" style="width: 80vw; background-color: var(--light-color); border-radius: 15px;">
            <p class="fs-4 m-0">Associação Bom Samaritano</p>
            <p>Endereço: R. Augusta, 500</p>
            <a href="google.com/maps/search/?api=1&query=-23.55052,-46.633308">Abrir no Google Maps</a>
        </div>
            <div class="d-flex flex-column align-items-start justify-content-center p-3 mb-3" style="width: 80vw; background-color: var(--light-color); border-radius: 15px;">
            <p class="fs-4 m-0">Centro Cultural União</p>
            <p>Endereço: Av. Santo Amaro, 800</p>
            <a href="google.com/maps/search/?api=1&query=-23.55052,-46.633308">Abrir no Google Maps</a>
        </div>
    </section>
    <div style="height: 15px !important;" class="break-line"></div>
    <!-- SEÇÃO INFORMAÇÃO -->
    <section id="doar" class="d-flex flex-column align-items-center justify-content-around pt-5 bg-custom-pri">
        <div class="d-flex align-items-center justify-content-evenly w-75">
            <div>
                <h5 class="fs-4">Quero doar alimentos</h5>
                <p>Você pode doar alimentos diretamente em um dos nossos pontos de coleta</p>
            </div>
            <a href="request.php" class="btn btn-custom-sec fw-bold">Doe Aqui!</a>
        </div>
        <div class="row row-cols-lg-3 w-75 gap-5 justify-content-center card-list">
            <div class="card text-center col gap-1">
                <i class="bi bi-box-seam-fill card-icon mt-2"></i>
                <h6 class="card-title fs-4">O que doar:</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Arroz, feijão, macarrão</li>
                    <li class="list-group-item">Óleo, sal, açúcar</li>
                    <li class="list-group-item">Café, leite em pó</li>
                    <li class="list-group-item">Enlatados e conservas</li>
                    <li class="list-group-item">Farinha, fubá</li>
                </ul>
            </div>
            <div class="card text-center col gap-1">
                <i class="bi bi-clock-fill card-icon mt-2"></i>
                <div class="card-body">
                    <h6 class="card-title fs-4">Quando devo doar?</h6>
                    <p class="card-text">
                        Nossos pontos de coleta funcionam de segunda a sexta, das 9h às 17h, e aos sábados das 9h às 12h.
                    </p>
                </div>
            </div>
            <div class="card text-center col gap-1">
                <i class="bi bi-exclamation-triangle-fill card-icon mt-2"></i>
                <div class="card-body">
                    <h6 class="card-title fs-4">Aviso importante</h6>
                    <p class="card-text">
                        Verifique a data de validade dos alimentos. Preferimos produtos com pelo menos 3 meses antes do vencimento.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <footer class="w-100 d-flex align-items-center justify-content-evenly" style="height: 10vh; background-color: var(--secondary-color);">
        <p>&copy; 2025 VidaSemFome - Todos os direitos reservados</p>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>