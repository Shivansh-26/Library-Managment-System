<?php
// Function to check email and password from users table
function checkLogin($email, $password) {
    // Include the database connection file
    include('db.php');
    
    // Check if the database connection is established
    if (!$con) {
        // Handle the connection error
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize user input to prevent SQL injection
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Query to check if the email and password exist in the users table
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // User found, return true
            return true;
        } else {
            // User not found, return false
            return false;
        }
    } else {
        // Error in query execution, return false
        return false;
    }

}
?>
