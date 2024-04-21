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

    // Prepare and execute SQL query to insert data into the database
    $query = "INSERT INTO issuebook (stuID, bookID, issueDate, dueDate) VALUES ('$stuID', '$bookID', '$issueDate', '$dueDate')";
    if (mysqli_query($con, $query)) {
        echo "Data added successfully";
    } else{
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "All fields are required.";
}

// Close the database connection
mysqli_close($con);
?>
