<?php
    $alerta = " <script>
                    alert(\"Banco de Dados criado com sucesso!\");
                </script>";

    try{
        $conn = new PDO("mysql:host=localhost", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
        $sql="create database jogo_da_memoria";
        $conn->exec($sql);
        $conn = null;

        $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //todo erro deve lancar uma PDO exception
        $sql = "create table Usuario(
            username char(25),
            senha char(30),
            nome char(50),
            dtNasc date,
            cpf varchar(11),
            email char(50),
            telefone char(11),
            primary key(username)
        );
        create table Partida(
            codPartida int,
            pontuacao int,
            dimensoes char(3),
            modalidade char(12),
            tempoGasto time,
            resultado boolean,
            data date,
            username char(25),
            primary key(codPartida),
            foreign key(username) references Usuario(username)
        );";
        $conn->exec($sql);

        $sql = "insert into Usuario values(\"Ana Julia\",\"euAmoOBruno\",\"Ana Schroder\",\"2003-05-07\",\"47125896103\",\"euAmoOBruno@gmail.com\",\"35998308408\");

        insert into Usuario values(\"Quessadasexual\",\"euAmoABraba\",\"J.Quessada\",\"2003-05-07\",\"47125896103\",\"euAmoABraba@gmail.com\",\"19996711722\");

        insert into Usuario values(\"Cavotron\",\"euAmoCorote\",\"G.Cavo\",\"2003-05-07\",\"47125896103\",\"euAmoCorote@gmail.com\",\"11961923985\");

        insert into Usuario values(\"Grafite\",\"euAmoJesus\",\"R.Salvino\",\"2003-05-07\",\"47125896103\",\"euAmoJesus@gmail.com\",\"66666666666\");

        insert into Partida values(1,8,\"4x4\",\"Classico\",\"00:05:23\",true,\"2022-11-23\",\"Ana Julia\");

        insert into Partida values(2,12,\"4x4\",\"Classico\",\"00:10:37\",true,\"2022-11-09\",\"Quessadasexual\");

        insert into Partida values(3,25,\"6x6\",\"Contra Tempo\",\"00:7:59\",true,\"2022-12-04\",\"Cavotron\");

        insert into Partida values(4,4,\"2x2\",\"Classico\",\"00:7:59\",true,\"2022-12-02\",\"Grafite\");";
        $conn->exec($sql);
        $conn = null;

        echo $alerta;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>