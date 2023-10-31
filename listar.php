<?php

require __DIR__ . '/conn.php';

session_start();
if(empty($_SESSION["login"]["id"])){
  header("location:index.php");
}

$sql = "select * from solicitacoes where apartamento = :apartamento";

// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Vincular os valores
$stmt->bindParam(':apartamento', $_SESSION["login"]["apartamento"], PDO::PARAM_STR);

// Executar a consulta
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Solicitações</title>
    <link rel="stylesheet" href="solicitacoes_style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/predinho.svg" alt="">
        </div>

        <h1>Listagem de solicitações</h1>
        <p>O espaço de solicitação de ocorrência no nosso condomínio tem a finalidade de facilitar a nossa comunicação direta com a administração, permitindo que possamos relatar problemas, fazer solicitações de serviços e expressar preocupações de maneira organizada e eficaz.</p>
      <table>
        <thead>
          <tr>
            <th>N°'</th>
            <th>Assunto</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($resultado as $ln){
          ?>
        <tr>
            <td><?=$ln["id"]?></td>
            <td><?=$ln["assunto"]?></td>
            <td><a href="editar.php?id=<?=$ln["id"]?>">Editar</a></td>
            <td><a href="excluir.php?id=<?=$ln["id"]?>">Excluir</a></td>
          </tr>
          <?php } ?>

        </tbody>

      </table>

    </div>
    
</body>
</html>