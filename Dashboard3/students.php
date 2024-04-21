<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted and all fields are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['studentid']) && !empty($_POST['studentName']) && !empty($_POST['studentBranch']) && !empty($_POST['Contact'])) {
    // Sanitize form data to prevent SQL injection
    $studentid = mysqli_real_escape_string($con, $_POST['studentid']);
    $studentName = mysqli_real_escape_string($con, $_POST['studentName']);
    $studentBranch = mysqli_real_escape_string($con, $_POST['studentBranch']);
    $contact = mysqli_real_escape_string($con, $_POST['Contact']);

    // Prepare and execute SQL query to insert student details into the database
    $query = "INSERT INTO students (studentID, studentName, studentBranch, contact) VALUES ('$studentid', '$studentName', '$studentBranch', '$contact')";
    if (mysqli_query($con, $query)) {
        echo "Student added successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "All fields are required.";
}

// Close the database connection
mysqli_close($con);
?>
