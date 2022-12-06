<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="cadastrostyle.css">
    <script src="ajax.js"></script>
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <form >
            <label for="name">
                <span>Nome Completo</span>
                <input type="text" id="name" name="name">
            </label>
            <!-- <label for="datanasc">
                <span>Data de nascimento</span>
                <input type="date" id="datanasc" name="datanasc">
            </label> -->
            <label for="cpf">
                <span>CPF</span>
                <input type="text" id="cpf" name="cpf">
            </label>
            <label for="phone">
                <span>Telefone</span>
                <input type="tel" id="phone" name="phone">
            </label>
            <label for="email">
                <span>E-mail</span>
                <input type="email" id="email" name="email">
            </label>
            <label for="user">
                <span>Username</span>
                <input type="text" id="user" name="user">
            </label>
            <label for="senha">
                <span>Senha</span>
                <input type="password" id="senha" name="senha">
            </label>           
        </form>
        <form>
            <a href="#" class="ancora" onclick="enviarDados()"><span>Cadastrar</span></a>
        </form>   
    </main>
</body>
</html>