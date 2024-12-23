<?php
session_start();

if (isset($_POST['uname']) && isset($_POST['pass'])) {

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=" . $uname;

    // Check if inputs are empty
    if (empty($uname)) {
        $em = "User name is required";
        header("Location: ../add-admin.php?error=$em&$data");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../add-admin.php?error=$em&$data");
        exit;
    } else {
        // Check if username already exists
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() > 0) {
            $em = "Username already exists";
            header("Location: ../add-admin.php?error=$em&$data");
            exit;
        } else {
            // Hash the password
            $hashedPass = password_hash($pass, PASSWORD_BCRYPT);

            // Insert new admin into the database
            $sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute([$uname, $hashedPass])) {
                $sm = "Admin added successfully!";
                header("Location: ../add-admin.php?success=$sm");
                exit;
            } else {
                $em = "An error occurred while adding the admin.";
                header("Location: ../add-admin.php?error=$em&$data");
                exit;
            }
        }
    }
} else {
    header("Location: ../add-admin.php?error=Invalid request");
    exit;
}
