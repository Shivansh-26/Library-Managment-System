<?php
    // Establishing a connection to the database
    session_start();
    $con = mysqli_connect("localhost", "root", "", "lms") or die(mysqli_error());
?>
