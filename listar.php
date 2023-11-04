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
    <link rel="stylesheet" href="listar_style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/predinho.svg" alt="">
        </div>

        <h1>Listagem de solicitações</h1>
        <p>Se por algum motivo surgir a necessidade de alterar ou excluir uma solicitação que tenha sido feita anteriormente, você pode ficar tranquilo, pois essa possibilidade está ao seu alcance através da área de edição.</p>
      <table>
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($resultado as $ln){
          ?>
        <tr>
            <td><?=$ln["id"]?></td>
            <td><?=$ln["assunto"]?></td>
            <td><a href="editar.php?id=<?=$ln["id"]?>"><img class="editar" src="images/edit.png" alt="Editar Solicitação"></a></td>
            <!-- <td><a href="excluir.php?id=<?=$ln["id"]?>"><img class="excluir" src="images/exclude.png" alt="Editar Solicitação"></a></td> -->
          </tr>
          <?php } ?>

        </tbody>

      </table>

      <a href="principal.php">
            <button type="button">Voltar</button>
      </a>

    </div>
    
</body>
</html>
<!-- -->