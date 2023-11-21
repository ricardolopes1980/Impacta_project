<?php

require __DIR__ . '/conn.php';

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Preparar a consulta de exclusão
    $sql = "DELETE FROM solicitacoes WHERE id = :id";

// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Vincular o parâmetro ID
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Executar a consulta
$stmt->execute();

header("location:listar.php");
}