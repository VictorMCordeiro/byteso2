<?php
// Conexão com banco de dados MySQL usando PDO
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=pc_builder;charset=utf8mb4',
        'root',   // usuário padrão no XAMPP
        ''        // senha em branco
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>