
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $Username = $_POST["searchUser"] ?? "";

    try {
        require_once "dbh.inc.php";

        // Checking whether the user exists
        $query = "SELECT * FROM users WHERE Username = :username";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $Username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Checking if user exists
        if (!$user) {

            $result = [];

        } else {

            // Now grabbing the comments
            $query = "SELECT * FROM comments WHERE username = :username";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":username", $Username);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Making PDO and statement null
        $stmt = null;
        $pdo = null;

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching User</title>
</head>
<body>

<h3>Search Results</h3>

<?php

if (empty($result)) {

    echo "<p>There were no search results</p>";

} else {

    foreach ($result as $row) {

        echo "<div>";

        echo htmlspecialchars($row["username"]) . "<br>";
        echo htmlspecialchars($row["comment_text"]) . "<br>";
        echo htmlspecialchars($row["created_at"]) . "<br>";

        echo "</div>";
    }
}

?>

</body>
</html>
