<?php session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>alert(\"Usuario não logado, favor relizar login para acessar as demais paginas\");</script>";
    echo "<script>window.location.href=\"../login/telaLogin.php\";</script>";
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterate Data Form</title>
    <link rel="stylesheet" type="text/css" href="edadostyle.css">
    <script src="ajax.js" defer></script>
</head>
<body>
    <main>
        <h1>Edite seus dados</h1>
        <form>
            <label for="name">
                <span>Nome Completo</span>
                <input type="text" id="name" name="name">
            </label>
            <label for="phone">
                <span>Telefone</span>
                <input type="text" id="phone" name="phone">
            </label>
            <label for="email">
                <span>E-mail</span>
                <input type="email" id="email" name="email">
            </label>
            <label for="senha">
                <span>Senha</span>
                <input type="password" id="senha" name="senha">
            </label>
            <a href="../jogo/jogo.php" class="ancora" onclick="enviarDados()"><span>Enviar</span></a>
        </form>
    </main>
</body>
</html>