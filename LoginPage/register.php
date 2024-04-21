<?php

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirmpassword = $_POST['cpass'];
    $contact_no = $_POST['contact_no'];

    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($contact_no) && $password == $confirmpassword) {
        // Prepare the SQL statement with placeholders
        $query = 'INSERT INTO users (firstname, lastname, email, contact_no, password) VALUES (?, ?, ?, ?, ?)';
        
        // Prepare the SQL statement
        $stmt = $con->prepare($query);

        // Bind parameters
        $stmt->bind_param('sssss', $firstname, $lastname, $email, $contact_no, $password);

        // Execute the query
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            echo 'User inserted successfully.';
        } else {
            echo 'Failed to insert user.';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 'All fields are required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/lib-logo.jpg" />
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class = "container" id="container">
        <div class="form-container sign-up">
            <form id ="register-form" method = "POST">
                <h1>Create Account</h1>
                <!-- <div class="social_icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div> -->
                <!-- <span>Or use email for registration</span> -->
                <div class="user--name">
                    <input type="text" placeholder="First Name" id="firstName" name = "firstname"required>
                    <input type="text" placeholder="Last Name" id="lastName" name ="lastname"required>
                </div>
                <input type="email" placeholder="Email" id="email" name="email" required>
                <input type="tel" placeholder="Contact No." id="contactNo" name = "contact_no" required>
                <input type="password" placeholder="Password" id="pass" name="pass" required>
                <input type="text" placeholder="Confirm Password" id="cpass" name = "cpass"required>
                <button type="button">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form id="login-form" action = "login-process.php" method = "POST">
                <h1>Sign In</h1>
                <!-- <div class="social_icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div> -->
                <!-- <span>Or use your email to sign in</span> -->
                <input type="email" placeholder="Email" id="username" name="user">
                <input type="password" placeholder="Password" id="password" name="pass">
                <a href="#">Forgot Your Password?</a>
                <button type="submit">Sign In</button>
             </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button type="button" class="hidden" id="log">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Don't have an account? Register with your personal details to use on site features.</p>
                    <button type="button" class="hidden" id="register">Sign Up</button>
                </div>
            </div> 
        </div>
    </div>

    <script src="register.js"></script>
</body>
</html>