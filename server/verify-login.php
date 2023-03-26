<?php
//include config
require "config.php";
// Start the session    
session_start();

// Check if the form was submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    // Retrieve the user with the matching username and password from the database
    $query = "SELECT id FROM users WHERE email='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    // If a matching user was found, log them in and store their ID in a session variable
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];

     

        header('Location: ../dashboard.php');
        exit();
       
    }
    else{
        
        $_SESSION['error'] = "Sorry! user or password Not correct";
        header('Location: ../login.php');
    }
}

// If the username and password didn't match or the form wasn't submitted, display the login form
?>
