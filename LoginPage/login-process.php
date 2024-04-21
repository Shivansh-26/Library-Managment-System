<?php

include('db.php');
// Include the function file
include('functions.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['user'];
    $password = $_POST['pass'];

    // Call the checkLogin function
    if (!empty($email) && !empty($password)) {
        if (checkLogin($email, $password)) {
            // Store user email in session for future use
            $_SESSION['user_email'] = $email;

            // Redirect to dashboard if login successful
            header('Location: ../Dashboard3/dashboard.php');
            exit();
        } else {
            // Display error message or handle invalid login
            echo "Invalid email or password.";
        }
    } else {
        // Display error message if email or password is empty
        echo "Email and password are required.";
    }
}
?>