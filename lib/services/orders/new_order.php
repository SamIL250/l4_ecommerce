<?php
    session_start();
    include '../../../config/config.php';

    function redirectWithMessage($message) :void {
        $_SESSION['notification'] = $message;
        header('location:../../../cart');
        exit();
    }

    $customer = $_POST['user_id'];
    $product = $_POST['product_id'];
    $payment_method = $_POST['payment_method'];
    $product_quantity = $_POST['cart_product_quantity'];

    $create_order = mysqli_query(
        $conn,
        "INSERT INTO `orders`(`customer`, `payment_method`) 
        VALUES ('$customer','$payment_method')"
    );

    if($create_order) {
        
    }
?>