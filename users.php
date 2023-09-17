<?php

try {
    // Dados de conexão
    $hostname = 'localhost';
    $dbname = 'impacta';
    $username = 'impacta';
    $password = 'impacta@123';

    // Criar uma instância PDO
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // Definir o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

#    echo "Conexão bem-sucedida";
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

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

