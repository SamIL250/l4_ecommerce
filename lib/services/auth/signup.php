<!-- //backend file -->
<?php
    session_start();
    include '../../../config/config.php';


    $names = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    function redirectWithMessage($message): void {
        $_SESSION['notification'] = $message;
        header('location:../../../auth-signup');
        exit();
    }

    // echo "names: ".$names;
    // echo "<br>";
    // echo "email: ".$email;
    // echo "<br>";
    // echo "phone: ".$phone;
    // echo "<br>";
    // echo "address: ".$address;
    // echo "<br>";
    // echo "pass: ".$password;
    // echo "<br>";
    // echo "confirm pass: ".$confirm_password;

    //validate fields
    if(empty($names) || empty($email) || empty($phone) || empty($address) || empty($password) || empty($confirm_password)) {
        redirectWithMessage("All field is required!");
    }

    //validate password
    if($password != $confirm_password) {
        redirectWithMessage("Passwords don't match!");
    }

    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithMessage("Invalid email address.");
    }

    //validate and existing email
    $check_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if(mysqli_num_rows($check_email) > 0) {
        redirectWithMessage("This email is already in use!");
    }

    //register user
    $create_user = mysqli_query(
        $conn,
        "INSERT INTO `users`(`username`, `email`, `phone_number`, `delivery_address`, `password`) 
        VALUES ('$names','$email','$phone','$address','$password')"
    );

    if(!$create_user) {
        redirectWithMessage("Sign Up failed, try again later");
    }

    //if user created
    $_SESSION['notification'] = "Your account was created successfully!, Sign In";
    header('location: ../../../auth-signin');

