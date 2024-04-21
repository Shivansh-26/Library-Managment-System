<?php
include('../LoginPage/db.php');
include('functions.php');
// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: ../LoginPage/register.php");
    exit();
}

// Assuming you have a function to get user details from the database
$userDetails = getUserDetails($_SESSION['user_email']); // Modify this function call according to your database structure

// Check if user details are fetched successfully
if ($userDetails) {
    $firstName = $userDetails['firstname'];
    $lastName = $userDetails['lastname'];
    $email = $userDetails['email'];
    $password = $userDetails['password']; // Note: You should not display password in profile
    $contact = $userDetails['contact_no'];
} else {
    // Handle error if user details are not fetched
    // You can redirect to an error page or display an error message
    echo "Error fetching user details";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../Assets/lib-logo.jpg" />
    <title>Profile</title>
    <link rel="stylesheet" href="style1.css" />
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="logo">
                <img src="../Assets/lib-logo.jpg" class="imga" />
                <h2>LMS</h2>
            </div>

            <ul class="menu">
                <li>
                    <a href="../Dashboard3/dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../Dashboard3/profile.php">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="../Dashboard3/statistics.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Statistics</span>
                    </a>
                </li>
                <li class="logout">
                <a href="../LoginPage/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main--content">
            <div class="profile--content">
                <div class="profile--page">
                    <i class="fas fa-user"></i>
                    <h1>My Profile</h1>
                    <div class="profile--block">
                        <label for="first-name">First Name</label>
                        <input type="text" id="firstName" value="<?php echo $firstName; ?>" readonly>
                    </div>

                    <div class="profile--block">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="lastName" value="<?php echo $lastName; ?>" readonly>
                    </div>

                    <div class="profile--block">
                        <label for="userEmail">Email</label>
                        <input type="text" id="userEmail" value="<?php echo $email; ?>" readonly>
                    </div>

                    <div class="profile--block">
                        <label for="userPass">Password</label>
                        <input type="text" id="userPass" value="*********" readonly>
                    </div>

                    <div class="profile--block">
                        <label for="userContact">Contact</label>
                        <input type="text" id="userContact" value="<?php echo $contact; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script1.js"></script>
</body>
</html>
