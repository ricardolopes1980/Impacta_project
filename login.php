<?php
session_start();

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
$sql = "SELECT * FROM condominos WHERE email = :email and senha = :senha";

// Preparar a consulta
//$stmt = $pdo->prepare($sql);

// Prepara a consulta
$consulta = $pdo->prepare($sql);

// Vincular os valores
$consulta->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
$consulta->bindParam(':senha', $_POST["senha"], PDO::PARAM_STR);

// Executa a consulta
$consulta->execute();

// Obtém os resultados como um array associativo
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado)==1){
    $_SESSION["login"]=$resultado[0];
    header("location:solicitacoes.html.php");
}else{
    header("location:index.php");
}

print_r ($resultado);
// Executar a consulta
// $stmt->execute();

// header("location:sucesso.html");

