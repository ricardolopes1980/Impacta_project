<?php

require __DIR__ . '/conn.php';

session_start();
if(empty($_SESSION["login"]["id"])){
  header("location:index.php");
}

$sql = "select * from solicitacoes where id = :id";

// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Vincular os valores
$stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);

// Executar a consulta
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Solicitações</title>
    <link rel="stylesheet" href="solicitacoes_style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/predinho.svg" alt="">
            </div>
        <h1>Editar uma solicitação</h1>
        <p>O espaço de solicitação de ocorrência no nosso condomínio tem a finalidade de facilitar a nossa comunicação direta com a administração, permitindo que possamos relatar problemas, fazer solicitações de serviços e expressar preocupações de maneira organizada e eficaz.</p>
        <form action="editar_cod.php" method="post" class="row g-3">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php echo $_SESSION["login"]["nome"] ?>">
            <input type="hidden" id="id" name="id" value="<?php echo $resultado[0]["id"] ?>">

            <label for="assunto">Assunto:</label>
            <input type="text" id="assunto" name="assunto" value="<?=$resultado[0]["assunto"] ?>" required>
            
            <div class="col-md-6">
                <label for="setor" class="form-label">Setor</label>
                <select id="setor" name=setor class="form-select" required style="width: 100%; height: 30px;">
                  <option selected>Escolha...</option>
                  <option value="1" <?php if($resultado[0]["setor"]==1) echo "selected"; ?>>Administração</option>
                  <option value="2" <?php if($resultado[0]["setor"]==2) echo "selected"; ?>>Limpeza</option>
                  <option value="3" <?php if($resultado[0]["setor"]==3) echo "selected"; ?>>Manutenção</option>
                </select>
              </div></br>
            
            <div class="col-md-6">
                <label for="areacomum" class="form-label">Área Comum</label>
                <select id="areacomum" name=areacomum class="form-select" required style="width: 100%; height: 30px;">
                  <option selected>Escolha...</option>
                  <option value="1" <?php if($resultado[0]["areacomum"]==1) echo "selected"; ?>>Hall do Andar</option>
                  <option value="2" <?php if($resultado[0]["areacomum"]==2) echo "selected"; ?>>Hall do Prédio</option>
                  <option value="3" <?php if($resultado[0]["areacomum"]==3) echo "selected"; ?>>Garagem</option>
                  <option value="4" <?php if($resultado[0]["areacomum"]==4) echo "selected"; ?>>Piscina</option>
                  <option value="5" <?php if($resultado[0]["areacomum"]==5) echo "selected"; ?>>Academia</option>
                  <option value="6" <?php if($resultado[0]["areacomum"]==6) echo "selected"; ?>>Quadra</option>
                </select>
              </div></br>

           <!-- <label for="areacomum">Área comum:</label>
            <input type="text" id="areacomum" name="areacomum" required>
            -->
            
            <label for="apartamento">Apartamento:</label>
            <input type="text" id="apartamento" name="apartamento" required value="<?php echo $_SESSION["login"]["apartamento"] ?>">
            
            <label for="descricao" class="form-label">Descrição (opcional):</label>
            <textarea class="form-control" rows="6" type="text" id="descricao" name="descricao" style="width: 100%;"><?=$resultado[0]["descricao"] ?></textarea>
            <p>
                                  
            <button type="submit">Enviar Solicitação</button>
            <button type="reset">Limpar</button>
            <a href="principal.php">
            <button type="button">Voltar</button>
            </a>
        </form>
    </div>
    <div class="predio"></div>
</body>
</html>