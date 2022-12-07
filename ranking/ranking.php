<?php
    session_start();
    if(!isset($_SESSION['username'])){
        echo "<script>alert(\"Usuario não logado, favor relizar login para acessar as demais paginas\");</script>";
        echo "<script>window.location.href=\"../login/telaLogin.php\";</script>";
      }
    $name = $_SESSION['username'];
    echo "<script>alert(\"$name\")</script>";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="ranking-style.css">
</head>
<body>
    <header>
        <a href="../jogo/jogo.php" class="ancora"><span>Voltar</span></a>
    </header>

        <?php
        echo"    <div class=\"ranking-body\">
        <h1 id=\"title\">Ranking</h1>
        <hr>
        <div id=\"table-label\">
            <div class=\"pos\">
                Posição
            </div>
            <div class=\"username\">
                Username
            </div>
            <div class=\"board-size\">
                Tamanho do tabuleiro
            </div>
            <div class=\"spent-time\">
                Tempo gasto
            </div>
            <div class=\"date\">
                Data
            </div>
            <div class=\"hour\">
                Pontuacao
            </div>
        </div>";
            echo"<ol id=\"ranking-ol\" class=\"ranking-el\">";
            try{
                $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
                $sql="select u.username,p.dimensoes,p.tempogasto,p.data,p.pontuacao
                from Usuario u inner join Partida p on u.username=p.username order by (pontuacao)";
                $stmt=$conn->query($sql);
                
                
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){//obtem a proxima linha
                    echo"   <li>";
                    echo"       <div class=\"username\">".$row["username"]."</div>";
                    echo"       <div class=\"board-size\">".$row["dimensoes"]."</div>";
                    echo"       <div class=\"spent-time\">".$row["tempogasto"]."</div>";
                    echo"       <div class=\"date\">".$row["data"]."</div>";
                    echo"       <div class=\"hour\">".$row["pontuacao"]."</div>";
                    echo"   </li>";
                }
                ////////////////
                $sql="select * from Partida";
                $stmt=$conn->query($sql);
                $count=count($stmt->fetchAll());
                echo "<script>alert(".$count.")</script>";
                $count++;
                $sql="insert into Partida (codPartida) values (".$count.")";
                $conn->exec($sql);
                $conn=null;
                ///////
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            echo"</ol>";
        ?> 
    </div>
</body>
</html>