<?php
include_once("../db_conn.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $username = $_POST['username'];

    $sql = "UPDATE users SET fname = ?, username = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$fname, $username, $id])) {
        header("Location: users.php?success=User updated successfully");
    } else {
        header("Location: users.php?error=Failed to update user");
    }
    exit;
} else {
    $id = $_GET['user_id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff; /* White form background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%; /* Full-width button */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Update User</h2>
        <form method="POST">
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
            <div class="mb-3">
                <label for="fname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?= $user['fname'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
