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