<?php
  session_start();
  if(!isset($_SESSION['username'])){
    echo "<script>alert(\"Usuario não logado, favor relizar login para acessar as demais paginas\");</script>";
    echo "<script>window.location.href=\"../login/telaLogin.php\";</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Historico</title>
</head>

<body>
  <h1 id="title">Histórico</h1>
  <h2 id="title_jogador">Histórico do {Jogador}</h2>

  <table class="tabela_info">
    <tr>
      <th>Numero de partidas</th>
      <th>Dimensões do tabuleiro</th>
      <th>Modalidade da partida</th>
      <th>Tempo gasto</th>
      <th>Resultado</th>
      <th>Data/Hora</th>
    </tr>
    <tr>
      <td>Partida 543</td>
      <td>4x4</td>
      <td>Aguma aí</td>
      <td>10</td>
      <td>Vencedor</td>
      <td>10/10/2022
        17:35
      </td>
    </tr>
    <tr>
      <td>Partida 543</td>
      <td>4x4</td>
      <td>Aguma aí</td>
      <td>10</td>
      <td>Vencedor</td>
      <td>10/10/2022
        17:35
      </td>
    </tr>
    <tr>
      <td>Partida 543</td>
      <td>4x4</td>
      <td>Aguma aí</td>
      <td>10</td>
      <td>Vencedor</td>
      <td>10/10/2022
        17:35
      </td>
    </tr>
  </table>
</body>

</html>