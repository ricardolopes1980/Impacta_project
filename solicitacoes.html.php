<?php
session_start();
if(empty($_SESSION["login"]["id"])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Solicitações</title>
    <link rel="stylesheet" href="solicitacoes_style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/predinho.svg" alt="">
            </div>
        <h1>Criar uma solicitação</h1>
        <p>O espaço de solicitação de ocorrência no nosso condomínio tem a finalidade de facilitar a nossa comunicação direta com a administração, permitindo que possamos relatar problemas, fazer solicitações de serviços e expressar preocupações de maneira organizada e eficaz.</p>
        <form action="solicitacoes.php" method="post" class="row g-3">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php echo $_SESSION["login"]["nome"] ?>">
            
            <label for="assunto">Assunto:</label>
            <input type="text" id="assunto" name="assunto" required>
            
            <div class="col-md-6">
                <label for="setor" class="form-label">Setor</label>
                <select id="setor" name=setor class="form-select" required style="width: 100%; height: 30px;">
                  <option selected>Escolha...</option>
                  <option value="1">Administração</option>
                  <option value="2">Limpeza</option>
                  <option value="3">Manutenção</option>
                </select>
              </div></br>
            
            <div class="col-md-6">
                <label for="areacomum" class="form-label">Área Comum</label>
                <select id="areacomum" name=areacomum class="form-select" required style="width: 100%; height: 30px;">
                  <option selected>Escolha...</option>
                  <option value="1">Hall do Andar</option>
                  <option value="2">Hall do Prédio</option>
                  <option value="3">Garagem</option>
                  <option value="4">Piscina</option>
                  <option value="5">Academia</option>
                  <option value="6">Quadra</option>
                </select>
              </div></br>

           <!-- <label for="areacomum">Área comum:</label>
            <input type="text" id="areacomum" name="areacomum" required>
            -->
            
            <label for="apartamento">Apartamento:</label>
            <input type="text" id="apartamento" name="apartamento" required value="<?php echo $_SESSION["login"]["apartamento"] ?>">
            
            <label for="descricao" class="form-label">Descrição (opcional):</label>
            <textarea class="form-control" rows="6" type="text" id="descricao" name="descricao" style="width: 100%;"></textarea>
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

<!-- -->