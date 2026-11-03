<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $Username=$_POST["username"];
    $Pwd=$_POST["password"];

    try{
        require_once "dbh.inc.php";
//require_once, require, include_once, include all are same but they throw diffrent exceptions

        //using prepared statement with named paramters.
        $query="DELETE FROM users where Username=:username AND Pwd=:pwd;";

        $stmt=$pdo->prepare($query);//sending to the db to prevent sql injection
        $stmt->bindParam(":username", $Username);
        $stmt->bindParam(":pwd", $Pwd);          // saved exactly as typed


        $stmt->execute();// now sending the real data of user to the db

        $pdo=null;
        $stmt=null;

        header("Location: ../index.php");

        die();
//we can also use exit() method but it is better to use die() when connections are there.
//without connections to exit a script we use exit() method.

    }catch(PDOException $e){
        die("Query failed". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}