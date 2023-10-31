<?php

require __DIR__ . '/conn.php';

// SQL de inserção
$sql = "INSERT INTO condominos (nome, cpf, email, fone_whatsapp, apartamento, bloco, senha) 
VALUES (:nome, :cpf, :email, :fone_whatsapp, :apartamento, :bloco, :senha)";

// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Vincular os valores
$stmt->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
$stmt->bindParam(':cpf', $_POST["cpf"], PDO::PARAM_STR);
$stmt->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
$stmt->bindParam(':fone_whatsapp', $_POST["fone_whatsapp"], PDO::PARAM_STR);
$stmt->bindParam(':apartamento', $_POST["apartamento"], PDO::PARAM_STR);
$stmt->bindParam(':bloco', $_POST["bloco"], PDO::PARAM_STR);
$stmt->bindParam(':senha', $_POST["senha"], PDO::PARAM_STR);


// Executar a consulta
$stmt->execute();

header("location:sucesso.html");

