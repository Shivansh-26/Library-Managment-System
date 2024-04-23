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

    // Check if the book has been issued before and not returned
    $checkQuery = "SELECT * FROM issuebook WHERE bookID = '$bookID' AND stuID = '$stuID' AND issueReturn IS NULL";
    $result = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Check if the latest issueReturn is less than the latest issueDate
        $latestIssueDateQuery = "SELECT issueDate FROM issuebook WHERE bookID = '$bookID' AND stuID = '$stuID' ORDER BY issueDate DESC LIMIT 1";
        $latestIssueDateResult = mysqli_query($con, $latestIssueDateQuery);
        $latestIssueReturnQuery = "SELECT issueReturn FROM issuebook WHERE bookID = '$bookID' AND stuID = '$stuID' ORDER BY issueDate DESC LIMIT 1";
        $latestIssueReturnResult = mysqli_query($con, $latestIssueReturnQuery);

        if ($latestIssueDateResult && $latestIssueReturnResult) {
            $latestIssueDate = mysqli_fetch_assoc($latestIssueDateResult)['issueDate'];
            $latestIssueReturn = mysqli_fetch_assoc($latestIssueReturnResult)['issueReturn'];

            if ($latestIssueReturn < $latestIssueDate) {
                // Book can be issued, insert a new record
                $insertQuery = "INSERT INTO issuebook (stuID, bookID, issueDate, dueDate) VALUES ('$stuID', '$bookID', '$issueDate', '$dueDate')";
                if (mysqli_query($con, $insertQuery)) {
                    echo "Book issued successfully";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                // Error: Latest issueReturn is not less than latest issueDate
                echo "Error: Latest issueReturn is not less than latest issueDate";
            }
        } else {
            // Error fetching latest issueDate or issueReturn
            echo "Error fetching latest issueDate or issueReturn";
        }
    } else {
        // Book has not been issued before or has been returned, insert a new record
        $insertQuery = "INSERT INTO issuebook (stuID, bookID, issueDate, dueDate) VALUES ('$stuID', '$bookID', '$issueDate', '$dueDate')";
        if (mysqli_query($con, $insertQuery)) {
            echo "Book issued successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
