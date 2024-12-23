<?php
include_once("../db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['user_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$password, $id])) {
        header("Location: users.php?success=Password updated successfully");
    } else {
        header("Location: users.php?error=Failed to update password");
    }
    exit;
} else {
    $id = $_GET['user_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Set Password</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form method="POST">
        <input type="hidden" name="user_id" value="<?= $id ?>">
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Set Password</button>
    </form>
</body>
</html>
