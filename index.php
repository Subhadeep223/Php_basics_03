<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db Connection</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

    <h3>Sign Up</h3>

    <form action="includes/formHandler.inc.php" method="post">
        <label for="username">UserName</label>
        <input type="text" name="username" placeholder="Enter your username">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your  password">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your Email">
        <button type="submit">SignUp</button>
    </form>
    
</body>
</html>