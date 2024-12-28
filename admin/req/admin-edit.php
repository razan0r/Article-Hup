<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) ) {

    if(isset($_POST['username'])) {

      include "../../db_conn.php";
      $username = $_POST['username'];
      $id = $_SESSION['admin_id'];

      if(empty($username)){
         $em = "Username is required"; 
         header("Location: ../profile.php?error=$em");
         exit;
      }
    
      $sql = "UPDATE admin SET username=? WHERE id=?";
      $stmt = $conn->prepare($sql);
      $res = $stmt->execute([$username, $id]);
    
      
     if ($res) {
        $_SESSION['username'] = $username;
          $sm = "Successfully edited!"; 
          header("Location: ../profile.php?success=$sm");
          exit;
      } else {
        $em = "Unknown error occurred"; 
        header("Location: ../profile.php?error=$em");
        exit;
      }

    } else {
        header("Location: ../profile.php");
        exit;
    }

} else {
    header("Location: ../admin-login.php");
    exit;
}
