<?php
session_start();
if(!empty($_SESSION["login"]["id"])){
  header("location:solicitacoes.html.php");
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Condômino/Usuários</title>
    <link rel="stylesheet" href="index_style.css">
    
</head>
<body>
    <div class="container">
        <div class="logo">
        <img src="images/predinho.svg" alt="">
        </div>
        <h1>Meu Condominío</h1>
        <p>Entre com o seus dados para se cadastrar</p>
        <form action="login.php" method="post">
            
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>
                      
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
                        
            <a href="usuario.html" role="button">
                <button type="button" class="btn btn-primary">Cadastra-se</button>
            </a>
            <button type="submit" class="btn btn-primary">Entrar</button>
            
        </form>
    </div>
    <div class="predio">
    </div>
</body>
</html>