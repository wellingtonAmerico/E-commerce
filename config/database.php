<?php

$databasePath = __DIR__ . '/../database/ecommerce.sqlite';

try {
    $conexao = new PDO('sqlite:' . $databasePath);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro na conexão: ' . $e->getMessage());
}
