<?php
session_start();
// Define ou inicia etapa de montagem
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}
// Avança etapa ao clicar em Próximo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['next'])) {
    $_SESSION['step']++;
}
// Volta etapa ao clicar em Voltar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['back'])) {
    $_SESSION['step']--;
}
// Reset de sessão
if (isset($_GET['reset'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
include 'main.php';
?>