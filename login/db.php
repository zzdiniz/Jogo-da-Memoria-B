<?php
    session_start();
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    try{
        $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
        $sql="select username, senha from Usuario where username=\"$username\" and senha=\"$pwd\"";
        $stmt=$conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        echo json_encode($row);
        if ($row){
            $_SESSION['username'] = $username;
        }
        else{
            session_destroy();
        }
       
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    ?>