<?php
// --- CAPTURA DOS DADOS DO FORMULÁRIO ---
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$data_nasc = $_POST['data_nasc'] ?? '';
$idade = $_POST['idade'] ?? '';
$telefone = $_POST['telefone'] ?? '';

$cursos = $_POST['curso'] ?? [];
$instituicoes = $_POST['instituicao'] ?? [];
$anos = $_POST['ano_conclusao'] ?? [];

$empresas = $_POST['empresa'] ?? [];
$cargos = $_POST['cargo'] ?? [];
$periodos = $_POST['periodo'] ?? [];
$descricoes = $_POST['descricao'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currículo de <?= htmlspecialchars($nome) ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    @media print {
      .no-print { display: none !important; }
      body { background: white !important; }
    }

    .curriculo-container {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 40px;
      max-width: 800px;
      margin: 50px auto;
    }

    h2 {
      color: #0d6efd;
      font-weight: 700;
      border-bottom: 2px solid #e9ecef;
      padding-bottom: 5px;
      margin-top: 30px;
    }

    .info-label {
      font-weight: 600;
      color: #333;
    }

    .section-content p {
      margin: 0;
      color: #555;
    }

    .header-info p {
      margin: 0;
    }
  </style>
</head>

<body class="bg-light">

  <div class="curriculo-container">
    <!-- CABEÇALHO -->
    <div class="text-center mb-4">
      <h1 class="fw-bold"><?= htmlspecialchars($nome) ?></h1>
      <div class="header-info text-muted">
        <p><?= htmlspecialchars($email) ?></p>
        <p><?= htmlspecialchars($telefone) ?></p>
        <p>Data de Nascimento: <?= htmlspecialchars($data_nasc) ?> (<?= htmlspecialchars($idade) ?> anos)</p>
      </div>
    </div>

    <!-- FORMAÇÃO ACADÊMICA -->
    <?php if (!empty($cursos)): ?>
      <h2>Formação Acadêmica</h2>
      <div class="section-content">
        <?php for ($i = 0; $i < count($cursos); $i++): ?>
          <p><span class="info-label"><?= htmlspecialchars($cursos[$i]) ?></span> — <?= htmlspecialchars($instituicoes[$i] ?? '') ?> <?= !empty($anos[$i]) ? "({$anos[$i]})" : '' ?></p>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <!-- EXPERIÊNCIAS PROFISSIONAIS -->
    <?php if (!empty($empresas)): ?>
      <h2>Experiência Profissional</h2>
      <div class="section-content">
        <?php for ($i = 0; $i < count($empresas); $i++): ?>
          <p>
            <span class="info-label"><?= htmlspecialchars($empresas[$i]) ?></span> — 
            <?= htmlspecialchars($cargos[$i] ?? '') ?> 
            <?= !empty($periodos[$i]) ? "({$periodos[$i]})" : '' ?>
          </p>
          <?php if (!empty($descricoes[$i])): ?>
            <p class="ms-3"><?= nl2br(htmlspecialchars($descricoes[$i])) ?></p>
          <?php endif; ?>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <!-- BOTÕES -->
    <div class="text-center mt-5 no-print">
      <button onclick="window.print()" class="btn btn-primary btn-lg px-4 me-2">Imprimir / Salvar PDF</button>
      <a href="formulario.php" class="btn btn-outline-secondary btn-lg px-4">Voltar</a>
    </div>
  </div>

</body>
</html>
