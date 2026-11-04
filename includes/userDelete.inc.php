
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $Username = $_POST["username"];
    $Pwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";

        // Cheking if the user name exits or not. by using select query 
        $query = "SELECT * FROM users WHERE Username = :username";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $Username);
        $stmt->execute();

        //  Fetching the user's data from the database.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //  Check username and password
        if (!$user || $Pwd !== $user["Pwd"]) {
            die("Incorrect Username or Password");
        }

        //Now we are deleting the user If credentials are correct
        $query = "DELETE FROM users WHERE Username = :username AND Pwd = :pwd";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $Username);
        $stmt->bindParam(":pwd", $Pwd);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    exit();
}