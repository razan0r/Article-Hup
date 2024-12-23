<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass']) && 
   isset($_FILES['profile_photo'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;

    if (empty($fname)) {
        $em = "Full name is required";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else if(empty($uname)){
        $em = "User name is required";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else if(empty($pass)){
        $em = "Password is required";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else if ($_FILES['profile_photo']['error'] !== UPLOAD_ERR_OK) {
        $em = "Error uploading profile photo";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else {
        // Process the file upload
        $uploadDir = "../upload/blog/";
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Validate file type
        $fileType = mime_content_type($_FILES['profile_photo']['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            $em = "Invalid file type. Only JPG, PNG, and GIF are allowed.";
            header("Location: ../signup.php?error=$em&$data");
            exit;
        }

        // Generate a unique filename
        $fileName = uniqid() . '-' . basename($_FILES['profile_photo']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetFilePath)) {
            $em = "Failed to upload profile photo.";
            header("Location: ../signup.php?error=$em&$data");
            exit;
        }

        // Hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO users (fname, username, password, profile_photo) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $pass, $fileName]);

        header("Location: ../signup.php?success=Your account has been created successfully");
        exit;
    }
} else {
    header("Location: ../signup.php?error=error");
    exit;
}
