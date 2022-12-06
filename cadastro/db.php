<?php

    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $name=$_POST["name"];
    $cpf=$_POST["cpf"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $array=['username'=>$username,'pwd'=>$pwd,'name'=>$name,'cpf'=>$cpf,'email'=>$email,'phone'=>$phone];//tirar isso dps
    try{
        $conn = new PDO("mysql:host=localhost;dbname=jogo_da_memoria", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//todo erro deve lancar uma PDO exception
        $sql="insert into Usuario values(\"$username\",\"$pwd\",\"$name\",\"$cpf\",\"$email\",\"$phone\")";
        $conn->exec($sql);
        $conn=null;
        echo json_encode($array);
        
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>