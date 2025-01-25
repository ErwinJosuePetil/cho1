<?php
// Start the session
session_start();

// Destroy all session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session itself

// Redirect to the login page or homepage
header("Location: ../index.php "); // Replace 'login.php' with your desired redirect page
exit(); // Ensure no further code is executed
?>
