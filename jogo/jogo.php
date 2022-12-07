<?php
  session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>alert(\"Usuario não logado, favor relizar login para acessar as demais paginas\");</script>";
    echo "<script>window.location.href=\"../login/telaLogin.php\";</script>";
  }
  $name = $_SESSION['username'];
  echo "<script>alert(\"Bem vindo de volta \"+\"$name\"+\"!\")</script>";
  echo "<script> var username = \"$_SESSION[username]\"; </script>";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="ajax.js" defer></script>
  <script src="script.js" defer></script>
  <title>Jogo da Memória</title>
</head>


<body>
  <h1 style="display: flex; justify-content:center; margin-top: 50px; left: 750px;">Jogo da memória</h1>
  <h2 style="position:absolute; left:710px; top: 110px;" id="timer">Escolha uma modalidade de jogo</h2>
  <input type="submit" id="back_time" value="Contra o tempo" onclick="verifyMode(this.id)">
  <input type="submit" id="classic" value="Clássico" onclick="verifyMode(this.id)">
  <p id="score">Partidas jogadas: 0. </p>
  <div class="game" id="game">
   
  </div>
  <div id="btn-section">
    <input type="submit" id="peaces" value="Mostrar Peças">
    <input type="submit" id="return" value="Reiniciar" onclick="f5()">
    <input type="button" id="disconnect" value="Desconectar" onclick="conexaoPHP(1)">
    <a id="alterate_btn" href="../altera_dados/alterate-data.php">Alterar dados
    </a>
    <a id="ranking-btn" href="../ranking/ranking.php">Ranking
    </a>
    </a>
    <a id="historico-btn" href="../historico/index.php">Historico
    </a>
  </div>
  <select name="Tamanho do tabuleiro" id="btnCharge" onclick="buttonPosition()">
    <option>Selecione</option>
    <option value="4">2x2</option>
    <option value="16">4x4</option>
    <option value="36">6x6</option>
    <option value="64">8x8</option>
  </select>

  <div id="why">
    <h2 style="font-size:30px">Porque Jogar o Jogo da memória?</h2>
    <h3>1 - Melhora sua capacidade de foco e concentração</h3>
    <p>Quando estamos jogando o jogo da memória, tendemos a manter o foco e a concentração bem apurados para o que está
      acontecendo diante de nossos olhos.
      A nossa ideia é manter uma concentração profunda para que possamos encontrar o par da nossa carta virada. Dessa
      maneira, deixamos de lado as distrações e exercitamos esse estado cerebral de “atenção plena”.</p>
    <h3>2 - Trabalha a interação com outras pessoas</h3>
    <p>Jogar com outras pessoas pode ser muito satisfatório e prazeroso. Isso porque estaremos estimulando a nossa
      comunicação interpessoal, e ainda estaremos rindo e nos divertindo com os outros. Logo, nos sentimos mais à
      vontade
      e fortalecemos laços sociais com amigos e pessoas que amamos.</p>
    <h3>3 - Desenvolve sua inteligência espacial</h3>
    <p>A sua inteligência espacial, de certo modo, também passa a ser estimulada. Afinal, você deverá recordar em qual
      parte da mesa determinada figura está posicionada. Isso melhora a sua visão geral do ambiente e o espaçamento
      entre
      as cartas.
      Como consequência, a sua inteligência espacial começa a ser estimulada com mais afinco. </p>
    <h3>4 - Estímula sua memória</h3>
    <p>Para os estudantes, o jogo da memória promete estimular o que o seu próprio nome declara: a memória.

      Até porque estaremos desenvolvendo nossa memória de trabalho, e isso é muito importante na hora em que estamos
      lendo, escrevendo ou aprendendo algo, uma vez que precisamos nos manter atento ao raciocínio e a linha de
      conhecimento explorada nesse caso.

      Se a nossa memória de trabalho falhar, não conseguiremos raciocinar acerca de um texto e tampouco interpretá-lo.
      Consequentemente não seremos capazes de absorver um novo conhecimento, e isso impactará profundamente os nossos
      resultados acadêmicos.</p>
    <h3>5 - Aumenta sua autoconfiança</h3>
    <p>Você sabia que o jogo da memória pode, ainda, melhorar a sua autoconfiança? Incrível, não? E sabe por que isso
      acontece? A gente te explica!

      Basicamente, é necessário ter autoconfiança enquanto se vira uma peça e procura o seu par. Você crê que a sua
      memória está lhe direcionando ao caminho certo. Ou seja, você acredita que realmente sabe o que está fazendo.

      Por isso, a sua autoconfiança começa a ser trabalhada. Você começa a ver que a sua capacidade de reconhecer os
      pares
      e lembrar onde eles estão é bem apurada, e isso traz autoestima durante o jogo, especialmente quando você acerta
      um
      par.

    </p>
  </div>
</body>

</html>
