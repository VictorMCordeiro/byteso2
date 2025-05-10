<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/cabecalho.php';

function calcularValorTotal($montagem) {
    $total = 0;
    foreach ($montagem as $peca) {
        $total += $peca['preco'];
    }
    return $total;
}

$step = $_SESSION['step'];
switch ($step) {
    case 1:
        $stmt  = $pdo->query('SELECT id, nome, tdp, soquete, video_integrado, preco FROM processadores LIMIT 3');
        $title = 'Selecione o Processador';
        $field = 'processador_id';
        break;
    case 2:
        $stmt  = $pdo->query('SELECT id, nome, tdp, soquete, qtd_slots_ram, preco FROM placas_mae LIMIT 3');
        $title = 'Selecione a Placa-mãe';
        $field = 'placa_mae_id';
        break;
    case 3:
        $stmt  = $pdo->query('SELECT id, capacidade_gb, frequencia_mhz, preco FROM memorias_ram LIMIT 3');
        $title = 'Selecione a Memória RAM';
        $field = 'ram_id';
        break;
    case 4:
        $stmt  = $pdo->query('SELECT id, nome, tdp, preco FROM placas_video LIMIT 3');
        $title = 'Selecione a Placa de Vídeo';
        $field = 'gpu_id';
        break;
    case 5:
        $stmt  = $pdo->query('SELECT id, tipo, tamanho_gb, velocidade_mb_s, preco FROM armazenamento LIMIT 3');
        $title = 'Selecione HD ou SSD';
        $field = 'armazenamento_id';
        break;
    case 6:
        $stmt  = $pdo->query('SELECT id, nome, preco FROM gabinetes LIMIT 3');
        $title = 'Selecione o Gabinete';
        $field = 'gabinete_id';
        break;
    case 7:
        $stmt  = $pdo->query('SELECT id, nome_fonte, potencia_capacidade_w, preco FROM fontes LIMIT 4');
        $title = 'Selecione a Fonte de Alimentação';
        $field = 'fonte_id';
        break;
    default:
        echo '<h2>Montagem concluída!</h2>';
        echo '<a href="?reset=1" class="btn btn-primary-custom">Refazer</a>';
        require __DIR__ . '/includes/rodape.php';
        exit;
}
$items = $stmt->fetchAll();
?>
<h2 class="mb-4 text-success"><?php echo $title; ?></h2>
<form method="post">
  <div class="row">
    <?php foreach ($items as $item): ?>
      <div class="col-md-4">
        <div class="card card-border mb-4">
          <div class="card-body">
            <?php foreach ($item as $key => $value) {
                if ($key === 'id') continue;
                echo '<p><strong>' . ucfirst(str_replace('_', ' ', $key)) . ':</strong> ' . htmlspecialchars($value) . '</p>';
            } ?>
            <div class="form-check mt-2">
              <input class="form-check-input" type="radio" name="<?php echo $field; ?>" id="item-<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>" required>
              <label class="form-check-label" for="item-<?php echo $item['id']; ?>">Selecionar</label>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <button type="submit" name="next" class="btn btn-primary-custom">Próximo</button>
  <button type="submit" name="back" class="btn btn-primary-custom">Voltar</button>
</form>