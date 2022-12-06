<?php
    session_start();
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];

    $username=$_SESSION['username'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
        //$sql="insert into Usuario values(\"$username\",\"$pwd\",\"$name\",\"$cpf\",\"$email\",\"$phone\")";
        $sql="";
        if(isset($name) && !empty($name)){
            $sql="update Usuario set nome=\"".$name."\" where username=\"".$username."\"";
            $conn->exec($sql);
        }
        if(isset($phone) && !empty($phone)){
            $sql="update Usuario set telefone=\"".$phone."\" where username=\"".$username."\"";
            $conn->exec($sql);
        }
        if(isset($email) && !empty($email)){
            $sql="update Usuario set email=\"".$email."\" where username=\"".$username."\"";
            $conn->exec($sql);
        }
        if(isset($pwd) && !empty($pwd)){
            $sql="update Usuario set senha=\"".$pwd."\" where username=\"".$username."\"";
            $conn->exec($sql);
        }
        echo json_encode($sql); 
        
        //$conn=null;
        
        
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>