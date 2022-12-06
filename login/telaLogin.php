<?php
  session_start();
  if (isset($_SESSION['username'])) {
      $name = $_SESSION['username'];
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estiloTelaLogin.css">
    <script src="ajax.js"></script>
</head>
<body>
    <main>
        <h1 class="form-title">Login</h1>
        <form class="form">
            <label for="user" class="form-label">
                <span class="input-title">Usuário</span>
                <input type="text" id="user" name="user" placeholder="Ex:MyUser" class="form-input">
            </label>
            <label for="password" class="form-label">
                <span class="input-title">Senha</span>
                <input type="password" id="password" name="password" placeholder="Ex:MySecretPassword" class="form-input">
            </label>
            <a href="#" class="ancora" id="login" onclick="enviarDados()"><span>Entrar</span></a>
            <a href="../cadastro/cadastro.php" class="ancora"><span>Não possuo cadastro</span></a>
        </form>
    </main>
</body>
</html>