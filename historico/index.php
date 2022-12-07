<?php
  session_start();
  $username = $_SESSION['username'];
  echo "<script> var username = '$username' </script>";
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
  <h2 id="title_jogador"></h2>

  <table class="tabela_info">
    <tr>
      <th>Nome do Jogador</th>
      <th>Dimensões do tabuleiro</th>
      <th>Modalidade da partida</th>
      <th>Tempo gasto</th>
      <th>Resultado</th>
      <th>Data/Hora</th>
    </tr>
    <?php
      try{
          $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql="select u.username,p.dimensoes,p.modalidade,p.tempogasto,p.resultado,p.data
          from Usuario u inner join Partida p on u.username=p.username
          where u.username = \"$username\"";
          $stmt=$conn->query($sql);
          $conn=null;
          
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              echo"   <tr>";
              echo"       <th class=\"username\">".$row["username"]."</th>";
              echo"       <th class=\"board-size\">".$row["dimensoes"]."</th>";
              echo"       <th class=\"modality\">".$row["modalidade"]."</th>";
              echo"       <th class=\"spent-time\">".$row["tempoGasto"]."</th>";
              echo"       <th class=\"result\">".$row["resultado"]."</th>";
              echo"       <th class=\"date\">".$row["data"]."</th>";
              echo"   </tr>";
          }
      }
      catch(PDOException $e){
          echo $e->getMessage();
      }
    ?>
  </table>

  <script defer>
    let jogador = window.document.querySelector("#title_jogador");
    jogador.innerText = `Histórico do jogador ${username}`;

  </script>
</body>

</html>