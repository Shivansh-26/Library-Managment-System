<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}

// Check if both student ID, book ID, and return date are provided
if (isset($_POST['stuID']) && isset($_POST['bookID']) && isset($_POST['returnDate'])) {
    // Sanitize input to prevent SQL injection
    $stuID = mysqli_real_escape_string($con, $_POST['stuID']);
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);
    $returnDate = mysqli_real_escape_string($con, $_POST['returnDate']);

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

    // Book and student IDs are verified, proceed with return process
    $returnDate = mysqli_real_escape_string($con, $_POST['returnDate']);

    // Convert date format to YYYY-MM-DD
    $returnDate = date('Y-m-d', strtotime($returnDate));

    // Get the due date of the book
    $dueDateQuery = "SELECT dueDate, issueReturn FROM issuebook WHERE stuID = '$stuID' AND bookID = '$bookID'";
    $dueDateResult = mysqli_query($con, $dueDateQuery);

    if (mysqli_num_rows($dueDateResult) > 0) {
        $row = mysqli_fetch_assoc($dueDateResult);
        $dueDate = $row['dueDate'];
        $issueReturn = $row['issueReturn'];

        // Check if issueReturn is null and returnDate from return--form > dueDate from issuebook
        if ($issueReturn === null && $returnDate > $dueDate) {
            // Calculate the number of days late
            $dateDiff = strtotime($returnDate) - strtotime($dueDate);
            $daysLate = floor($dateDiff / (60 * 60 * 24));

            // Calculate fine (assuming 8 rupees per day)
            $fine = $daysLate * 8;

            // Update issueReturn and fine in issuebook table
            $updateQuery = "UPDATE issuebook SET issueReturn = '$returnDate', fine = '$fine' WHERE stuID = '$stuID' AND bookID = '$bookID'";
            mysqli_query($con, $updateQuery);

            // Display message in popup form
            echo "<script>alert('Book returned successfully. Fine: Rs. $fine');</script>";
        } elseif ($issueReturn === null && $returnDate <= $dueDate) {
            // Update issueReturn in issuebook table
            $updateQuery = "UPDATE issuebook SET issueReturn = '$returnDate' WHERE stuID = '$stuID' AND bookID = '$bookID'";
            mysqli_query($con, $updateQuery);

            // Display message in popup form
            echo "<script>alert('Book returned successfully. No fine.');</script>";
        }
    } else {
        echo "Due date not found.";
    }
} else {
    echo "Student ID, Book ID, and Return Date are required.";
}

// Close the database connection
mysqli_close($con);
?>
