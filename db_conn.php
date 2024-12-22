<?php 

// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "article_db";

// Using PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully using PDO"; // Optional success message
} catch (PDOException $e) {
    die("Connection failed (PDO): " . $e->getMessage());
}

// Using MySQLi
$mysqli_conn = new mysqli($servername, $username, $password, $dbname);

// Check MySQLi connection
if ($mysqli_conn->connect_error) {
    die("Connection failed (MySQLi): " . $mysqli_conn->connect_error);
}
echo "Connected successfully using MySQLi"; // Optional success message

?>
