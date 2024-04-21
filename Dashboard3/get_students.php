<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "lms");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to select all students from the database
$query = "SELECT * FROM students";

// Execute the query
$result = mysqli_query($con, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store in an array
    $students = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    // Convert the array to JSON format
    $json = json_encode($students);

    // Output JSON data
    header('Content-Type: application/json');
    echo $json;
} else {
    // No students found in the database
    echo json_encode(array('message' => 'No students found.'));
}

// Close the database connection
mysqli_close($con);
?>
