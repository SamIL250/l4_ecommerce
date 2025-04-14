<?php
    session_start();
    include '../../../config/config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    function redirectWithMessage($message) {
        $_SESSION['notification'] = $message;
        header('location:../../../auth-signin');
        exit();
    }
    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithMessage("Invalid email address.");
    }

    //check user
    $check_user = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if(!$check_user) {
        redirectWithMessage("Failed to sign you in, Please, try again later!");
    } 

    if(mysqli_num_rows($check_user) == 0) {
        redirectWithMessage("Incorrect username or password!");
    }

    //user info
    $user_id = "";
    $username = "";
    $phone_number= "";

    foreach($check_user as $user) {
        $user_id = $user['user_id'];
        $username = $user['username'];
        $phone_number = $user['phone_number'];
    } 

    $_SESSION['user'] = [
        'user_id'=> $user_id,
        'email' => $email,
        'username' => $username,
        'phone_number' => $phone_number
    ];

    header('location: ../../../index');