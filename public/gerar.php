<?php
// --- CAPTURA DOS DADOS DO FORMULÁRIO ---
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$data_nasc = $_POST['data_nasc'] ?? '';
$idade = $_POST['idade'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';

$cursos = $_POST['curso'] ?? [];
$instituicoes = $_POST['instituicao'] ?? [];
$anos = $_POST['ano_conclusao'] ?? [];

$empresas = $_POST['empresa'] ?? [];
$cargos = $_POST['cargo'] ?? [];
$periodos = $_POST['periodo'] ?? [];
$descricoes = $_POST['descricao'] ?? [];


if (!empty($data_nasc)) {
    $data_obj = new DateTime($data_nasc);
    $data_nasc_br = $data_obj->format('d/m/Y');
} else {
    $data_nasc_br = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currículo - <?= htmlspecialchars($nome) ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    padding: 40px;
  }

  .curriculo-container {
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    padding: 50px;
    max-width: 800px;
    margin: 0 auto;
  }

  /* Cor principal ajustada */
  h1 {
    text-transform: uppercase;
    font-size: 1.8rem;
    font-weight: 700;
    color: #0a3d62; /* Azul escuro elegante */
    text-align: center;
    margin-bottom: 30px;
  }

  h2 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0a3d62; /* Azul escuro consistente */
    border-bottom: 2px solid #0a3d6220;
    padding-bottom: 5px;
    margin-top: 30px;
  }

  .dados-pessoais p {
    margin: 0;
    line-height: 1.6;
  }

  .dados-pessoais {
    margin-bottom: 20px;
  }

  .section-content p {
    margin: 0;
    line-height: 1.6;
    color: #444;
  }

  @media print {
    .no-print { display: none !important; }
    body { background: white; padding: 0; }
    .curriculo-container {
      box-shadow: none;
      border: none;
      margin: 0;
    }
  }

  /* Ajuste nos botões */
  .btn-primary {
    background-color: #0a3d62;
    border: none;
  }

  .btn-primary:hover {
    background-color: #083251;
  }

  .btn-outline-secondary {
    color: #555;
    border-color: #aaa;
  }

  .btn-outline-secondary:hover {
    background-color: #eee;
  }
</style>

</head>

<body>
  <div class="curriculo-container">
    <!-- TÍTULO -->
    <h1>Currículo</h1>

    <!-- DADOS PESSOAIS -->
    <div class="dados-pessoais">
      <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
      <p><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
      <p><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></p>
      <?php if (!empty($endereco)): ?>
        <p><strong>Endereço:</strong> <?= htmlspecialchars($endereco) ?></p>
      <?php endif; ?>
      <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($data_nasc_br) ?> (<?= htmlspecialchars($idade) ?> anos)</p>
    </div>

    <!-- FORMAÇÃO ACADÊMICA -->
    <?php if (!empty($cursos)): ?>
      <h2>Formação Acadêmica</h2>
      <div class="section-content">
        <?php for ($i = 0; $i < count($cursos); $i++): ?>
          <p>
            <strong><?= htmlspecialchars($cursos[$i]) ?></strong> —
            <?= htmlspecialchars($instituicoes[$i] ?? '') ?>
            <?= !empty($anos[$i]) ? "({$anos[$i]})" : '' ?>
          </p>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <!-- EXPERIÊNCIA PROFISSIONAL -->
    <?php if (!empty($empresas)): ?>
      <h2>Experiência Profissional</h2>
      <div class="section-content">
        <?php for ($i = 0; $i < count($empresas); $i++): ?>
          <p>
            <strong><?= htmlspecialchars($empresas[$i]) ?></strong> —
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
    <div class="text-center mt-4 no-print">
      <button onclick="window.print()" class="btn btn-primary btn-lg me-2">Imprimir / Salvar PDF</button>
      <a href="formulario.php" class="btn btn-outline-secondary btn-lg">Voltar</a>
    </div>
  </div>
</body>
</html>
