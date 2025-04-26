<?php
/**
 * Arquivo: montepc.php
 * Descrição: Página "Monte seu PC" similar à aba da Pichau, usando Bootstrap 5 e jQuery para dropdowns dependentes.
 */

require_once 'config/database.php'; // Ajuste o caminho conforme sua estrutura

// Busca processadores com seu soquete
$stmt = $pdo->query(
    "SELECT p.id, p.name, a.value AS socket
    FROM products p
    JOIN attributes a ON a.product_id = p.id
    WHERE p.category='processador' AND a.name='soquete'"
);
$processors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monte seu PC</title>
  <!-- Bootstrap CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Monte seu PC</a>
    </div>
  </nav>
  <main class="container my-5">
    <div class="row g-4">
      <!-- Seleção de Processador -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Processador</div>
          <div class="card-body">
            <select id="processor" class="form-select">
              <option value="">Selecione um processador</option>
              <?php foreach($processors as $p): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['name']) ?> (<?= htmlspecialchars($p['socket']) ?>)</option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <!-- Seleção de Placa-mãe -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Placa-mãe do bryan,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</div>
          <div class="card-body">
            <select id="motherboard" class="form-select" disabled>
              <option>Escolha o processador primeiro</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- jQuery e Bootstrap Bundle JS via CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#processor').on('change', function(){
        var id = $(this).val();
        if(!id){
          $('#motherboard').prop('disabled', true).html('<option>Escolha o processador primeiro</option>');
          return;
        }
        $.post('get_motherboards.php', { processor_id: id }, function(data){
          $('#motherboard').prop('disabled', false).html(data);
        });
      });
    });
  </script>
</body>
</html>

<?php
/**
 * Arquivo: get_motherboards.php
 * Descrição: Retorna opções de placas-mãe compatíveis com o processador selecionado.
 */

require_once 'config/database.php'; // Ajuste o caminho conforme sua estrutura
if(empty($_POST['processor_id'])) exit;
$id = (int) $_POST['processor_id'];
$sql = "
  SELECT p.id, p.name, a.value AS socket
  FROM products p
  JOIN attributes a ON a.product_id = p.id
  WHERE p.category='placa-mae' AND a.name='soquete'
    AND a.value = (
      SELECT value FROM attributes
      WHERE product_id = ? AND name = 'soquete'
    )
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$motherboards = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($motherboards as $m){
  echo '<option value="'.$m['id'].'">'.htmlspecialchars($m['name']).' ('.htmlspecialchars($m['socket']).')</option>';
}
?>
