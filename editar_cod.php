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

// Obtém o valor selecionado do elemento <select>
if (isset($_POST['opcao'])) {
    $opcao_selecionada = $_POST['setor'];
}
if (isset($_POST['opcao'])) {
    $opcao_selecionada = $_POST['areacomum'];
}

// SQL de inserção
$sql = "UPDATE solicitacoes set nome=:nome, assunto=:assunto, setor=:setor, areacomum=:areacomum, apartamento=:apartamento, descricao=:descricao 
where id=:id";

// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Vincular os valores
$stmt->bindParam(':id', $_POST["id"], PDO::PARAM_INT);
$stmt->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
$stmt->bindParam(':assunto', $_POST["assunto"], PDO::PARAM_STR);
$stmt->bindParam(':setor', $_POST["setor"], PDO::PARAM_STR);
$stmt->bindParam(':areacomum', $_POST["areacomum"], PDO::PARAM_STR);
$stmt->bindParam(':apartamento', $_POST["apartamento"], PDO::PARAM_STR);
$stmt->bindParam(':descricao', $_POST["descricao"], PDO::PARAM_STR);

// Executar a consulta
$stmt->execute();

header("location:listar.php");

# fim