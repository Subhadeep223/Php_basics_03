<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Delete</title>
    <link rel="stylesheet" href="../CSS/updateDeletestyle.css">
</head>
<body>

    <h3>Update Account</h3>

<form action="userUpdate.inc.php" method="post">
    <label for="update-username">Username</label>
    <input type="text" id="update-username" name="username" placeholder="Enter your username" autocomplete="username" required>

    <label for="update-password">Password</label>
    <input type="password" id="update-password" name="password" placeholder="Enter your password" autocomplete="new-password" minlength="8" required>

    <label for="update-email">Email</label>
    <input type="email" id="update-email" name="email" placeholder="Enter your email" autocomplete="email" required>

    <button type="submit">Update Account</button>
</form>

<h3>Delete Account</h3>

<form action="userDelete.inc.php" method="post"
      onsubmit="return confirm('Delete this account permanently?');">
    <label for="delete-username">Username</label>
    <input type="text" id="delete-username" name="username" placeholder="Enter your username" autocomplete="username" required>

    <label for="delete-password">Password</label>
    <input type="password" id="delete-password" name="password" placeholder="Enter your password" autocomplete="current-password" required>

    <button type="submit">Delete Account</button>
</form>

    
</body>
</html>