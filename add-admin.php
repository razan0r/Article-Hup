<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>
<body>
    <h1>Add Admin</h1>
    <form action="admin/add-admin-process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="uname" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="pass" required><br><br>

        <button type="submit">Add Admin</button>
    </form>
</body>
</html>
