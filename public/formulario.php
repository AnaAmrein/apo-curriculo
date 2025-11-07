<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preencher Currículo</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="text-center mb-5">
      <h1 class="fw-bold text-primary">Preencha suas informações</h1>
      <p class="text-muted">Complete seus dados e gere seu currículo profissional.</p>
    </div>

    <form id="curriculoForm" action="gerar.php" method="post" class="mx-auto" style="max-width: 800px;">
      <!-- DADOS PESSOAIS -->
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
          <h5 class="fw-bold text-secondary mb-3">Dados Pessoais</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nome completo</label>
              <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Data de nascimento</label>
              <input type="date" name="data_nasc" id="data_nasc" class="form-control" required>
            </div>
            <div class="col-md-2">
              <label class="form-label">Idade</label>
              <input type="text" id="idade" name="idade" class="form-control" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label">Telefone</label>
              <input type="text" name="telefone" class="form-control" placeholder="(00) 00000-0000">
            </div>
            <div class="col-md-12">
              <label class="form-label">Endereço completo</label>
              <input type="text" name="endereco" class="form-control" placeholder="Rua, número, bairro, cidade, estado" required>
            </div>

          </div>
        </div>
      </div>

      <!-- FORMAÇÃO ACADÊMICA -->
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-secondary m-0">Formação Acadêmica</h5>
            <button type="button" id="addFormacao" class="btn btn-sm btn-outline-primary">+ Adicionar</button>
          </div>
          <div id="formacoes"></div>
        </div>
      </div>

      <!-- EXPERIÊNCIAS PROFISSIONAIS -->
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-secondary m-0">Experiência Profissional</h5>
            <button type="button" id="addExp" class="btn btn-sm btn-outline-primary">+ Adicionar</button>
          </div>
          <div id="experiencias"></div>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg px-4">Gerar Currículo</button>
      </div>
    </form>
  </div>

  <!-- Templates ocultos -->
  <template id="templateFormacao">
    <div class="border p-3 rounded mb-3 bg-white">
      <div class="row g-3">
        <div class="col-md-6">
          <input type="text" name="curso[]" class="form-control" placeholder="Curso" required>
        </div>
        <div class="col-md-6">
          <input type="text" name="instituicao[]" class="form-control" placeholder="Instituição" required>
        </div>
        <div class="col-md-6">
          <input type="text" name="ano_conclusao[]" class="form-control" placeholder="Ano de conclusão">
        </div>
        <div class="col-md-6 text-end">
          <button type="button" class="btn btn-sm btn-outline-danger remover">Remover</button>
        </div>
      </div>
    </div>
  </template>

  <template id="templateExperiencia">
    <div class="border p-3 rounded mb-3 bg-white">
      <div class="row g-3">
        <div class="col-md-6">
          <input type="text" name="empresa[]" class="form-control" placeholder="Empresa" required>
        </div>
        <div class="col-md-6">
          <input type="text" name="cargo[]" class="form-control" placeholder="Cargo" required>
        </div>
        <div class="col-md-6">
          <input type="text" name="periodo[]" class="form-control" placeholder="Período (Ex: 2022 - 2024)">
        </div>
        <div class="col-md-6 text-end">
          <button type="button" class="btn btn-sm btn-outline-danger remover">Remover</button>
        </div>
        <div class="col-12">
          <textarea name="descricao[]" class="form-control" rows="2" placeholder="Descrição das atividades"></textarea>
        </div>
      </div>
    </div>
  </template>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    // Cálculo automático da idade
    $('#data_nasc').on('change', function() {
      const data = new Date(this.value);
      const hoje = new Date();
      let idade = hoje.getFullYear() - data.getFullYear();
      const m = hoje.getMonth() - data.getMonth();
      if (m < 0 || (m === 0 && hoje.getDate() < data.getDate())) idade--;
      $('#idade').val(idade);
    });

    // Adicionar e remover formações
    $('#addFormacao').on('click', function() {
      const tpl = $('#templateFormacao').html();
      $('#formacoes').append(tpl);
    });

    // Adicionar e remover experiências
    $('#addExp').on('click', function() {
      const tpl = $('#templateExperiencia').html();
      $('#experiencias').append(tpl);
    });

    // Remover blocos
    $(document).on('click', '.remover', function() {
      $(this).closest('.border').remove();
    });

    // Adiciona um campo inicial de exemplo
    $('#addFormacao').click();
    $('#addExp').click();
  </script>

</body>
</html>
