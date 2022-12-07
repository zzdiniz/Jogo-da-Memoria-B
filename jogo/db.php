<?php

    if ($_POST['disconnect'] == 1) {
        session_destroy();
    }

    $username = $_POST['username'];
    $score = $_POST['score'];
    $size = $_POST['size'];
    $mode = $_POST['mode'];
    $time = $_POST['time'];
    $res = $_POST['res'];

    
    switch ($size) {
        case 4:
            $size = '2x2';
            break;
        case 16:
            $size = '4x4';
            break;
        case 36:
            $size = '6x6';
            break;
        case 64:
            $size = '8x8';
            break;
        }

    if ($mode == -1) {
        $mode = 'Contra Tempo';
    } else {
        $mode = 'Classico';
    }
                    
    $data_array = ['username' => $username,'score' => $score, 'size' => $size, 'mode' => $mode, 'time' => $time ,'res' => $res];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
        $sql="select * from Partida";
        $stmt=$conn->query($sql);
        $count=count($stmt->fetchAll());
        $count++;
        $sql="insert into Partida values(".$count.",\"$score\",\"$size\",\"$mode\",\"$time\", $res, CURDATE(), \"$username\")";
        $conn->exec($sql);
        $conn=null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } 

    echo json_encode($data_array);
?>