<?php
// formulário para gerar currículo profissional
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Currículo Profissional</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #f5f6fa;
      font-family: "Segoe UI", sans-serif;
    }
    .container {
      max-width: 900px;
      margin-top: 40px;
      margin-bottom: 60px;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      padding: 30px;
      margin-bottom: 30px;
      background: white;
    }
    h2 {
      text-align: center;
      color: #0d6efd;
      font-weight: 700;
      margin-bottom: 25px;
    }
    h4 {
      color: #0d6efd;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .btn-outline-primary, .btn-success {
      border-radius: 8px;
    }
    .btn-outline-primary:hover {
      background-color: #0d6efd;
      color: white;
    }
    .btn-success {
      background-color: #0d6efd;
      border: none;
    }
    .btn-success:hover {
      background-color: #0b5ed7;
    }
    footer {
      text-align: center;
      font-size: 0.9rem;
      color: #888;
      margin-top: 40px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2><i class="bi bi-file-earmark-person"></i> Gerador de Currículo Profissional</h2>

    <form action="generate.php" method="POST">

      <!-- Dados Pessoais -->
      <div class="card">
        <h4><i class="bi bi-person-lines-fill"></i> Dados Pessoais</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Nome completo:</label>
            <input type="text" name="nome" class="form-control" required>
          </div>
          <div class="col-md-3 mb-3">
            <label>Data de nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" class="form-control">
          </div>
          <div class="col-md-3 mb-3">
            <label>Idade:</label>
            <input type="text" id="idade" name="idade" class="form-control" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Endereço:</label>
            <input type="text" name="endereco" class="form-control">
          </div>
          <div class="col-md-3 mb-3">
            <label>Telefone:</label>
            <input type="text" name="telefone" class="form-control">
          </div>
          <div class="col-md-3 mb-3">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control">
          </div>
        </div>
      </div>

      <!-- Resumo Profissional -->
      <div class="card">
        <h4><i class="bi bi-chat-left-text-fill"></i> Resumo Profissional / Objetivo</h4>
        <textarea name="resumo" class="form-control" rows="4" placeholder="Ex: Profissional dedicada com experiência em confecção e gestão de equipes. Busco oportunidade para aplicar meus conhecimentos e crescer profissionalmente."></textarea>
      </div>

      <!-- Formação -->
      <div class="card">
        <h4><i class="bi bi-mortarboard-fill"></i> Formação Acadêmica</h4>
        <div id="formacoes"></div>
        <button type="button" class="btn btn-outline-primary mt-2" id="addFormacao">
          <i class="bi bi-plus-circle"></i> Adicionar Formação
        </button>
      </div>

      <!-- Experiências -->
      <div class="card">
        <h4><i class="bi bi-briefcase-fill"></i> Experiências Profissionais</h4>
        <div id="experiencias"></div>
        <button type="button" class="btn btn-outline-primary mt-2" id="addExperiencia">
          <i class="bi bi-plus-circle"></i> Adicionar Experiência
        </button>
      </div>

      <!-- Referências -->
      <div class="card">
        <h4><i class="bi bi-people-fill"></i> Referências Pessoais</h4>
        <div id="referencias"></div>
        <button type="button" class="btn btn-outline-primary mt-2" id="addReferencia">
          <i class="bi bi-plus-circle"></i> Adicionar Referência
        </button>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-lg px-4">
          <i class="bi bi-check-circle"></i> Gerar Currículo
        </button>
      </div>
    </form>

    <footer>
      Desenvolvido para o projeto de programação web | <strong>EnxovalApp</strong>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Calcula idade automaticamente
    $('#nascimento').on('change', function(){
      const nasc = new Date(this.value);
      const hoje = new Date();
      let idade = hoje.getFullYear() - nasc.getFullYear();
      const m = hoje.getMonth() - nasc.getMonth();
      if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
      $('#idade').val(idade);
    });

    // Adicionar formação
    $('#addFormacao').click(function(){
      $('#formacoes').append(`
        <div class="border p-3 mb-3 rounded">
          <label>Curso:</label>
          <input type="text" name="curso[]" class="form-control mb-2" required>
          <label>Instituição:</label>
          <input type="text" name="instituicao[]" class="form-control mb-2" required>
          <label>Ano de Conclusão:</label>
          <input type="text" name="ano_conclusao[]" class="form-control mb-2">
          <button type="button" class="btn btn-sm btn-danger removerFormacao">Remover</button>
        </div>
      `);
    });
    $(document).on('click', '.removerFormacao', function(){ $(this).closest('div.border').remove(); });

    // Adicionar experiência
    $('#addExperiencia').click(function(){
      $('#experiencias').append(`
        <div class="border p-3 mb-3 rounded">
          <label>Empresa:</label>
          <input type="text" name="empresa[]" class="form-control mb-2" required>
          <label>Cargo:</label>
          <input type="text" name="cargo[]" class="form-control mb-2" required>
          <label>Período:</label>
          <input type="text" name="periodo[]" class="form-control mb-2" placeholder="Ex: 2021 - 2024">
          <label>Atividades desenvolvidas:</label>
          <textarea name="atividades[]" class="form-control mb-2" rows="3" placeholder="Descreva suas principais atividades..."></textarea>
          <button type="button" class="btn btn-sm btn-danger removerExp">Remover</button>
        </div>
      `);
    });
    $(document).on('click', '.removerExp', function(){ $(this).closest('div.border').remove(); });

    // Adicionar referência
    $('#addReferencia').click(function(){
      $('#referencias').append(`
        <div class="border p-3 mb-3 rounded">
          <label>Nome:</label>
          <input type="text" name="ref_nome[]" class="form-control mb-2" required>
          <label>Contato:</label>
          <input type="text" name="ref_contato[]" class="form-control mb-2" placeholder="Telefone ou e-mail">
          <button type="button" class="btn btn-sm btn-danger removerRef">Remover</button>
        </div>
      `);
    });
    $(document).on('click', '.removerRef', function(){ $(this).closest('div.border').remove(); });
  </script>
</body>
</html>
