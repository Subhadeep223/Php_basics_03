<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    die();
}

$Username = mb_strtolower(trim($_POST["username"] ?? ""));
$Pwd      = $_POST["password"] ?? "";
$Email    = mb_strtolower(trim($_POST["email"] ?? ""));

if ($Username === "" || $Pwd === "" || $Email === "") {
    die("Please fill in all fields.");
}

try {
    require_once "dbh.inc.php";

    $query = "UPDATE users SET Username = :username, Pwd = :pwd, Email = :email WHERE id = 2";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $Username);
    $stmt->bindParam(":pwd", $Pwd);          // saved exactly as typed
    $stmt->bindParam(":email", $Email);

    $stmt->execute();

    $pdo  = null;
    $stmt = null;

    header("Location: ../index.php");
    exit;

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}