<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    echo "Connection failed: " . mysqli_connect_error();
     
}

// Check if both student ID, book ID, and return date are provided
if (isset($_POST['stuID']) && isset($_POST['bookID']) && isset($_POST['returnDate'])) {
    // Sanitize input to prevent SQL injection
    $stuID = mysqli_real_escape_string($con, $_POST['stuID']);
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);
    $returnDate = mysqli_real_escape_string($con, $_POST['returnDate']);

    // Convert date format to YYYY-MM-DD
    $returnDate = date('Y-m-d', strtotime($returnDate));

    // Prepare and execute SQL query to check if student ID exists
    $studentQuery = "SELECT * FROM students WHERE studentID = '$stuID'";
    $studentResult = mysqli_query($con, $studentQuery);

    // Check if student ID exists
    if (mysqli_num_rows($studentResult) == 0) {
        echo "Student ID does not exist.";
         
    }

    // Prepare and execute SQL query to check if book ID exists
    $bookQuery = "SELECT * FROM books WHERE bookID = '$bookID'";
    $bookResult = mysqli_query($con, $bookQuery);

    // Check if book ID exists
    if (mysqli_num_rows($bookResult) == 0) {
        echo "Book ID does not exist.";
         
    }

    // Check if the book has already been returned
    $alreadyReturnedQuery = "SELECT issueReturn FROM issuebook WHERE bookID = '$bookID' AND stuID = '$stuID' ORDER BY issueDate DESC LIMIT 1";
    $alreadyReturnedResult = mysqli_query($con, $alreadyReturnedQuery);

    if ($alreadyReturnedResult) {
        $row = mysqli_fetch_assoc($alreadyReturnedResult);
        if ($row['issueReturn'] !== null) {
            echo "This book has already been returned.";
             
        }
    }

    // Prepare and execute SQL query to get the book with the latest issueDate
    $latestIssueQuery = "SELECT * FROM issuebook WHERE bookID = '$bookID' AND stuID = '$stuID' ORDER BY issueDate DESC LIMIT 1";
    $latestIssueResult = mysqli_query($con, $latestIssueQuery);

    if (mysqli_num_rows($latestIssueResult) > 0) {
        $row = mysqli_fetch_assoc($latestIssueResult);
        $dueDate = $row['dueDate'];

        // Check if the return is late
        if ($returnDate > $dueDate) {
            // Calculate the number of days late
            $dateDiff = strtotime($returnDate) - strtotime($dueDate);
            $daysLate = floor($dateDiff / (60 * 60 * 24));

            // Calculate fine (assuming 8 rupees per day)
            $fine = $daysLate * 8;

            // Update issueReturn and fine in issuebook table
            $updateQuery = "UPDATE issuebook SET issueReturn = '$returnDate', fine = '$fine' WHERE bookID = '$bookID' AND stuID = '$stuID' AND dueDate = '$dueDate'";
            if (mysqli_query($con, $updateQuery)) {
                echo "Book returned successfully. Fine: Rs. $fine";
            } else {
                echo "Error: " . mysqli_error($con);
                 
            }
        } else {
            // Update issueReturn in issuebook table
            $updateQuery = "UPDATE issuebook SET issueReturn = '$returnDate' WHERE bookID = '$bookID' AND stuID = '$stuID' AND dueDate = '$dueDate'";
            if (mysqli_query($con, $updateQuery)) {
                echo "Book returned successfully. No fine.";
                 
            } else {
                echo "Error: " . mysqli_error($con);
                 
            }
        }
    } else {
        echo "No record found for the given book ID and student ID.";
         
    }
} else {
    echo "Student ID, Book ID, and Return Date are required.";
}

// Close the database connection
mysqli_close($con);
?>
