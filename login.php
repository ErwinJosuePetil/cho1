<?php
session_start();

include "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // password will not be used for verification

    // Secure query using prepared statements
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists (without password verification)
    if ($user) {
        $_SERVER['id'] = $user['id'];
        $_SESSION['user'] = $user['username']; // Or use user ID for better tracking
        if ($user['role'] == 'admin') {
            // Admin user
            $_SESSION['user'] = $user['username']; // Or use user ID for better tracking
            header("Location: admin/index.php");
            exit();
        } else if ($user['role'] == 'nurse') {
            // Normal user
            $_SESSION['user'] = $user['username']; // Or use user ID for better tracking
            header("Location: nurse/index.php");
            exit();
        }
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password.');</script>";
        header("Location: index.php");
    }
}
