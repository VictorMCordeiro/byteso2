<?php
// Cabeçalho comum com Bootstrap e tema verde
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monte seu PC</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #28a745;
            --dark-bg: #1f1f1f;
        }
        body { background-color: #f0fdf4; }
        .navbar { background-color: var(--primary-green) !important; }
        .nav-pills .nav-link { color: var(--dark-bg); }
        .nav-pills .nav-link.active { background-color: var(--primary-green); color: #fff; }
        .card-border { border: 2px solid var(--primary-green) !important; }
        .btn-primary-custom { background-color: var(--primary-green); border-color: var(--primary-green); color: #fff; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PC Builder</a>
  </div>
</nav>
<main class="container py-4">