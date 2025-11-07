<?php
// index.php - formulário
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículo</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Gerador CV</a>
    <div>
      <a class="btn btn-outline-primary" href="index.php">Criar</a>
      <a class="btn btn-outline-secondary" href="gerar.php" target="_blank">Visualizar (exemplo)</a>
    </div>
  </div>
</nav>

<div class="container">
  <form id="cvForm" action="gerar.php" method="post" target="_blank">
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Nome completo</label>
        <input required name="nome" type="text" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">Data de nascimento</label>
        <input required id="data_nasc" name="data_nasc" type="date" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">Idade</label>
        <input id="idade" name="idade" readonly class="form-control">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Resumo profissional</label>
      <textarea name="resumo" class="form-control" rows="3"></textarea>
    </div>

    <h5>Experiências profissionais</h5>
    <div id="experiencias">
      <!-- template será clonado -->
    </div>
    <button id="addExp" type="button" class="btn btn-sm btn-success mb-3"> + Adicionar experiência</button>

    <div>
      <button type="submit" class="btn btn-primary">Gerar Currículo</button>
      <button type="button" id="limpar" class="btn btn-outline-secondary">Limpar</button>
    </div>
  </form>
</div>

<!-- experiência template (invisível) -->
<template id="expTemplate">
  <div class="card mb-2">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <input name="empresa[]" class="form-control mb-2" placeholder="Empresa / Cargo" required>
        </div>
        <div class="col-md-4">
          <input name="periodo[]" class="form-control mb-2" placeholder="Período (ex: 2019 - 2021)">
        </div>
        <div class="col-md-3 text-end">
          <button type="button" class="btn btn-sm btn-danger remove-exp">Remover</button>
        </div>
      </div>
      <textarea name="descricao[]" class="form-control" rows="2" placeholder="Descrição das atividades"></textarea>
    </div>
  </div>
</template>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  // app.js inline: cálculo de idade e campos dinâmicos
  $(function(){
    function calcularIdade(datastr){
      if(!datastr) return '';
      const hoje = new Date();
      const nasc = new Date(datastr);
      let idade = hoje.getFullYear() - nasc.getFullYear();
      const m = hoje.getMonth() - nasc.getMonth();
      if(m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
      return idade;
    }
    $('#data_nasc').on('change', function(){
      $('#idade').val(calcularIdade(this.value));
    });

    // adicionar experiência
    $('#addExp').on('click', function(){
      const tpl = document.getElementById('expTemplate').content.cloneNode(true);
      $('#experiencias').append(tpl);
    });

    // remover
    $(document).on('click', '.remove-exp', function(){
      $(this).closest('.card').remove();
    });

    $('#limpar').on('click', function(){
      $('#cvForm')[0].reset();
      $('#experiencias').empty();
      $('#idade').val('');
    });

    // adicionar um template inicial
    $('#addExp').click();
  });
</script>
</body>
</html>
