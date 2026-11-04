<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $Username=$_POST["username"];
    $Pwd=$_POST["password"];
    $Email=$_POST["email"];

    try{
        require_once "dbh.inc.php";
//require_once, require, include_once, include all are same but they throw diffrent exceptions

        //using prepared statement without named paramters.
        $query="INSERT INTO users (Username,Pwd,Email) values (?,?,?);";

        $stmt=$pdo->prepare($query);//sending to the db to prevent sql injection

        $stmt->execute(["$Username","$Pwd","$Email"]);// now sending the real data of user to the db

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



/*Note:--We satinize our post data whenever we are displaying something in the browser 
we do not sanitize data when we are storing it in the database.

//Prepared statement is used to store data in sql database for security such as sql injection
//we write the query in php then we send it to the db then afterwards we bind data the user sends
//with the the query and then we finally send it to the database.



//using prepared statement named paramter 

 try{
        require_once "dbh.inc.php";
//require_once, require, include_once, include all are same but they throw diffrent exceptions

        //using prepared statement without named paramters.
        $query="INSERT INTO users (Username,Pwd,Email) values (:username,:pwd,:email);";

        $stmt=$pdo->prepare($query);//sending to the db to prevent sql injection
        $stmt=$pdo->bindParam(":username",$Username);
        $stmt=$pdo->bindParam(":pwd",$Pwd);
        $stmt=$pdo->bindParam(":email",$Email);
//a named paramter is now bound to an actual data submitted by the user.enhances the security
before sending it to the db again


        $stmt->execute();

        $pdo=null;
        $stmt=null;

        header("Location: ../index.php");

        die();

*/