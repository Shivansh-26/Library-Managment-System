<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}

// Check if both student ID and book ID are provided
if (isset($_POST['stuID']) && isset($_POST['bookID'])) {
    // Sanitize input to prevent SQL injection
    $stuID = mysqli_real_escape_string($con, $_POST['stuID']);
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);

    // Prepare and execute SQL query to check if student ID exists
    $studentQuery = "SELECT * FROM students WHERE studentID = '$stuID'";
    $studentResult = mysqli_query($con, $studentQuery);

    // Check if student ID exists
    if (mysqli_num_rows($studentResult) == 0) {
        echo "Student ID does not exist.";
        exit;
    }

    // Prepare and execute SQL query to check if book ID exists
    $bookQuery = "SELECT * FROM books WHERE bookID = '$bookID'";
    $bookResult = mysqli_query($con, $bookQuery);

    // Check if book ID exists
    if (mysqli_num_rows($bookResult) == 0) {
        echo "Book ID does not exist.";
        exit;
    }

    // If both IDs exist, provide a success message
    echo "IDs verified.";
} else {
    echo "Student ID and Book ID are required.";
}

// Close the database connection
mysqli_close($con);
?>
