<?php
    session_start();
    include '../../../config/config.php';

    $product_id = $_GET['product_id'];
    $user_id = $_GET['user_id'];

    function redirectWithMessage($message) :void {
        $_SESSION['notification'] = $message;
        header('location:../../../cart');
        exit();
    }
    
    //remove item
    $remove_item = mysqli_query(
        $conn,
        "DELETE FROM cart WHERE user = '$user_id' AND product =  '$product_id'"
    );

    if($remove_item) {
        redirectWithMessage("Product removed from cart");
    }
    redirectWithMessage("Failed to remove item!");