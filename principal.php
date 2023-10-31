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
    <title>Cadastro de Condômino/Usuários</title>
    <link rel="stylesheet" href="principal_style.css">
    
</head>
<body>
<div class="geral">
    <a href="logout.php" role="button"><img class="voltar" src="images/logout.svg" alt=""></a>
        <div class="container">
            <div class="logo">
                <img src="images/predinho.svg" alt="">
                <h1>Meu Condomínio</h1>
            </div>
            <h2>Bem Vindo, <b><?php echo $_SESSION["login"]["nome"]?></b></h2>
            <p><h2>Apartamento <?php echo $_SESSION["login"]["apartamento"]?></h2></p>
            <div class="menus">
                    <div class="botoes">
                        <a href="solicitacoes.html.php">
                        <Button><img src="images/livro.png" alt="">
                        <h4>Criar Solicitação</h4>
                        </Button>
                        </a>
                    </div>
                    <div class="botoes">
                        <a href="listar.php">
                        <Button><img src="images/editor.png" alt="">
                        <h4>Editar Solicitação</h4>
                        </Button>
                        </a>
                    </div>
                    <div class="botoes">
                        <a href="logout.php">
                        <Button><img src="images/leitor.png" alt="">
                        <h4>Sair</h4>
                        </Button>
                        </a>
                    </div>
            </div>
        </div>
</div>
</body>
</html>