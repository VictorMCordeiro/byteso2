<?php
session_start();
require_once __DIR__ . '/config/db.php'; // para usar o $pdo

// Define ou inicia etapa de montagem
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}

// Reset de sessão
if (isset($_GET['reset'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Avança etapa ao clicar em Próximo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['next'])) {
    $step = $_SESSION['step'];

    // Define campo e tabela com base no passo
    switch ($step) {
        case 1: $field = 'processador_id'; $table = 'processadores'; break;
        case 2: $field = 'placa_mae_id'; $table = 'placas_mae'; break;
        case 3: $field = 'ram_id'; $table = 'memorias_ram'; break;
        case 4: $field = 'gpu_id'; $table = 'placas_video'; break;
        case 5: $field = 'armazenamento_id'; $table = 'armazenamento'; break;
        case 6: $field = 'gabinete_id'; $table = 'gabinetes'; break;
        case 7: $field = 'fonte_id'; $table = 'fontes'; break;
    }

    if (!empty($_POST[$field])) {
        $id = (int) $_POST[$field];
        $stmt = $pdo->prepare("SELECT id, nome, preco FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        $peca = $stmt->fetch();

        if ($peca) {
            $_SESSION['montagem'][$field] = [
                'id' => $peca['id'],
                'nome' => $peca['nome'],
                'preco' => (float) $peca['preco']
            ];
        }
    }

    $_SESSION['step']++;
}

// Volta etapa ao clicar em Voltar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['back'])) {
    $_SESSION['step']--;
}

// Inclui interface principal
include 'main.php';
