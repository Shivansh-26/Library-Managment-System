<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted and all fields are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['bookID']) && !empty($_POST['bookName']) && !empty($_POST['authorName']) && !empty($_POST['publishYear'])) {
    // Sanitize form data to prevent SQL injection
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);
    $bookName = mysqli_real_escape_string($con, $_POST['bookName']);
    $authorName = mysqli_real_escape_string($con, $_POST['authorName']);
    $publishYear = mysqli_real_escape_string($con, $_POST['publishYear']);

    // Prepare and execute SQL query to insert book details into the database
    $query = "INSERT INTO books (bookID, bookName, authorName, publishYear) VALUES ('$bookID', '$bookName', '$authorName', '$publishYear')";
    if (mysqli_query($con, $query)) {
        echo "Book added successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "All fields are required.";
}

// Close the database connection
mysqli_close($con);
?>
