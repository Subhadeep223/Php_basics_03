<?php

$dsn="mysql:host=localhost;port=3307;dbname=myFirstDb";
//dsn(Data Source Name)-- a string that contains the collection of information 
//required to connect an application to a specific database.

$dbusername="root";
$dbpassword="";

/*Ways to connect to database 

mysql connection---> this is obsolete and have security issues.
mysql i---->>improved one
pdo---> One of the best method to connect.it is flexible and can be used to connect with other databases.
pdo(php data object) is basically turns a connection into a database object so that we can 
use it in out php code.
*/

try{

    $pdo=new PDO($dsn,$dbusername,$dbpassword);
// here we are instanciating a new PDO object from the pre defined PDO class of PHP.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//now we are setting the attributes of PDO object on how to handle errors.

}catch(PDOException $e){
    echo "Connection Failed". $e->getMessage(); //getMessage is a method
}

//Prepared statement is used to store data in sql database for security 
//we write the query in php then we send it to the db then afterwards we bind data the user sends
//with the the query and then we finally send it to the database.