<?php

// Get All USERS
function getAll($conn) {
    $sql = "SELECT id, fname, username FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get User By ID
function getUserById($conn, $id) {
    $sql = "SELECT id, fname, username FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        return $stmt->fetch();
    } else {
        return 0;
    }
}

// Add New User
function addUser($conn, $fname, $username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Secure password
    $sql = "INSERT INTO users (fname, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$fname, $username, $hashedPassword]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Update User Information
function updateUser($conn, $id, $fname, $username) {
    $sql = "UPDATE users SET fname=?, username=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$fname, $username, $id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Set User Password
function setUserPassword($conn, $id, $newPassword) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Secure password
    $sql = "UPDATE users SET password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$hashedPassword, $id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Delete By ID
function deleteById($conn, $id) {
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}
?>
