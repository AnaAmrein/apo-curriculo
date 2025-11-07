<?php
// Recebe os dados do formulário
$nome        = $_POST['nome'] ?? '';
$nascimento  = $_POST['nascimento'] ?? '';
$idade       = $_POST['idade'] ?? '';
$endereco    = $_POST['endereco'] ?? '';
$telefone    = $_POST['telefone'] ?? '';
$email       = $_POST['email'] ?? '';
$resumo      = $_POST['resumo'] ?? '';

$cursos       = $_POST['curso'] ?? [];
$instituicoes = $_POST['instituicao'] ?? [];
$anos         = $_POST['ano_conclusao'] ?? [];

$empresas     = $_POST['empresa'] ?? [];
$cargos       = $_POST['cargo'] ?? [];
$periodos     = $_POST['periodo'] ?? [];
$atividades   = $_POST['atividades'] ?? [];

$ref_nomes    = $_POST['ref_nome'] ?? [];
$ref_contatos = $_POST['ref_contato'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Currículo de <?= htmlspecialchars($nome) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background: #f5f6fa; font-family: "Segoe UI", sans-serif; color: #333; }
    .curriculo-container {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      padding: 50px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h1 { font-size: 2rem; color: #0d6efd; border-bottom: 3px solid #0d6efd; padding-bottom: 8px; margin-bottom: 25px; }
    h3 { color: #0d6efd; font-weight: 600; margin-top: 35px; }
    .btn-print { display: block; margin: 20px auto; background: #0d6efd; color: #fff; border: none; padding: 10px 25px; border-radius: 8px; }
    @media print { .btn-print, .btn-back { display: none; } body { background: white; } .curriculo-container { box-shadow: none; border: none; } }
  </style>
</head>
<body>

  <div class="text-center">
    <button class="btn-print" onclick="window.print()">🖨️ Imprimir Currículo</button>
    <a href="formulario.php" class="btn btn-outline-secondary btn-back">← Voltar</a>
  </div>

  <div class="curriculo-container">
    <h1><?= htmlspecialchars($nome) ?></h1>
    <p><strong>Endereço:</strong> <?= htmlspecialchars($endereco) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></p>
    <p><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
    <?php if ($idade): ?><p><strong>Idade:</strong> <?= htmlspecialchars($idade) ?> anos</p><?php endif; ?>

    <?php if ($resumo): ?>
      <h3>🎯 Resumo Profissional</h3>
      <p><?= nl2br(htmlspecialchars($resumo)) ?></p>
    <?php endif; ?>

    <?php if (!empty($cursos)): ?>
      <h3>🎓 Formação Acadêmica</h3>
      <?php foreach ($cursos as $i => $curso): ?>
        <p><strong><?= htmlspecialchars($curso) ?></strong> — <?= htmlspecialchars($instituicoes[$i] ?? '') ?> (<?= htmlspecialchars($anos[$i] ?? '') ?>)</p>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($empresas)): ?>
      <h3>💼 Experiências Profissionais</h3>
      <?php foreach ($empresas as $i => $empresa): ?>
        <p><strong><?= htmlspecialchars($empresa) ?></strong> — <?= htmlspecialchars($cargos[$i] ?? '') ?> (<?= htmlspecialchars($periodos[$i] ?? '') ?>)</p>
        <?php if (!empty($atividades[$i])): ?>
          <p><em><?= nl2br(htmlspecialchars($atividades[$i])) ?></em></p>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($ref_nomes)): ?>
      <h3>📇 Referências Pessoais</h3>
      <?php foreach ($ref_nomes as $i => $ref_nome): ?>
        <p><strong><?= htmlspecialchars($ref_nome) ?></strong> — <?= htmlspecialchars($ref_contatos[$i] ?? '') ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
</html>
