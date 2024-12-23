<?php 
session_start();

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=" . $uname;

    // Validate input
    if (empty($uname)) {
        $em = "Username is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../login.php?error=$em&$data");
        exit;
    }

    try {
        // Fetch user details from the database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();

            // Extract user data
            $username = $user['username'];
            $password = $user['password'];
            $fname = $user['fname'];
            $id = $user['id'];
            $profile_photo = isset($user['profile_photo']) ? $user['profile_photo'] : null; // Handle null profile photo

            // Verify password
            if (password_verify($pass, $password)) {
                // Store user data in session
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['fname'] = $fname;
                $_SESSION['profile_photo'] = $profile_photo; // Add profile photo to session

                // Redirect to blog page
                header("Location: ../blog.php");
                exit;
            } else {
                $em = "Incorrect username or password";
                header("Location: ../login.php?error=$em&$data");
                exit;
            }
        } else {
            $em = "User not found";
            header("Location: ../login.php?error=$em&$data");
            exit;
        }
    } catch (Exception $e) {
        $em = "An error occurred: " . $e->getMessage();
        header("Location: ../login.php?error=$em");
        exit;
    }
} else {
    header("Location: ../login.php?error=Please fill in all required fields");
    exit;
}
