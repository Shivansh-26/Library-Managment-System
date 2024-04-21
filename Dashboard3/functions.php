<?php

function getUserDetails($email) {
// Assuming db.php contains database connection details
    $con = mysqli_connect("localhost", "root", "", "lms") or die(mysqli_error());
    
    // Sanitize email input to prevent SQL injection
    $email = mysqli_real_escape_string($con, $email);
    
    // Query to retrieve user details based on email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);

    // Check if query executed successfully
    if ($result) {
        // Fetch user details as an associative array
        $userDetails = mysqli_fetch_assoc($result);

        // Return user details array if found, otherwise return false
        return $userDetails ? $userDetails : false;
    } else {
        // Error in query execution
        // Close database connection
        mysqli_close($con);

        // Return false
        return false;
    }
}
?>