index.php
<?php
// Início do arquivo principal
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>

    <!-- Link do Bootstrap (ou Tailwind, se preferir) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">

    <!-- MENU DE NAVEGAÇÃO -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Formulário</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="container text-center mt-5">
        <h1 class="mb-3"> Bem-vindo ao Gerador de Currículos</h1>
        <p class="lead">Este sistema permite que você cadastre suas informações pessoais e profissionais e gere seu currículo em minutos.</p>
        <a href="formulario.php" class="btn btn-primary btn-lg mt-3">Criar Novo Currículo</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
