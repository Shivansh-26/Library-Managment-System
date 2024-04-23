<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookID']) && isset($_POST['bookName']) && isset($_POST['authorName']) && isset($_POST['publishYear'])) {
    // Sanitize input to prevent SQL injection
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);
    $bookName = mysqli_real_escape_string($con, $_POST['bookName']);
    $authorName = mysqli_real_escape_string($con, $_POST['authorName']);
    $publishYear = mysqli_real_escape_string($con, $_POST['publishYear']);

    // Prepare and execute SQL query to insert the book data into the database
    $insertQuery = "INSERT INTO books (bookID, bookName, authorName, publishYear) VALUES ('$bookID', '$bookName', '$authorName', '$publishYear')";
    if (mysqli_query($con, $insertQuery)) {
        echo "Book added successfully";
    } else {
        // Display error message in a JavaScript alert dialog box
        echo "An error occurred while adding the book. Please try again later.";
    }
} else {
    echo "Book data is required.";
}

// Close the database connection
mysqli_close($con);
?>
