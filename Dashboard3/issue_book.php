<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted and all fields are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!empty($_POST['stuID']) && !empty($_POST['bookID']) && !empty($_POST['issueDate']) && !empty($_POST['dueDate']))) {
    // Sanitize input to prevent SQL injection
    $stuID = mysqli_real_escape_string($con, $_POST['stuID']);
    $bookID = mysqli_real_escape_string($con, $_POST['bookID']);
    $issueDate = mysqli_real_escape_string($con, $_POST['issueDate']);
    $dueDate = mysqli_real_escape_string($con, $_POST['dueDate']);

    // Convert date format to YYYY-MM-DD
    $issueDate = date('Y-m-d', strtotime($issueDate));
    $dueDate = date('Y-m-d', strtotime($dueDate));

    // Check if there is a non-null returnDate for the current bookID
    $checkQuery = "SELECT issueReturn FROM issuebook WHERE bookID = '$bookID' LIMIT 1";
    $result = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Fetching the issueReturn value
        $row = mysqli_fetch_assoc($result);
        $issueReturn = $row['issueReturn'];

        if ($issueReturn !== null) {
            // If issueReturn is not null, display error
            echo "Error: This book is not available to be issued.";
        } else {
            // Check if bookID from issue--form is present in attribute issuebook and attribute bookID in books table
            $bookCheckQuery = "SELECT * FROM issuebook WHERE bookID = '$bookID'";
            $bookCheckResult = mysqli_query($con, $bookCheckQuery);

            if (mysqli_num_rows($bookCheckResult) > 0) {
                // If bookID exists in issuebook table
                // Display error: book cannot be issued
                echo "Error: This book cannot be issued.";
            } else {
                // If bookID does not exist in issuebook table
                // Proceed with insertion
                $query = "INSERT INTO issuebook (stuID, bookID, issueDate, dueDate) VALUES ('$stuID', '$bookID', '$issueDate', '$dueDate')";
                if (mysqli_query($con, $query)) {
                    echo "Data added successfully";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }
        }
    } else {
        // If issueReturn is null, proceed with insertion
        $query = "INSERT INTO issuebook (stuID, bookID, issueDate, dueDate) VALUES ('$stuID', '$bookID', '$issueDate', '$dueDate')";
        if (mysqli_query($con, $query)) {
            echo "Data added successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
