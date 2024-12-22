<?php
// Include your database connection file
include 'db_conn.php';

// Check if the connection is established
if ($conn) {
    echo "Database connection successful.";
} else {
    echo "Failed to connect to the database.";
}
?>
