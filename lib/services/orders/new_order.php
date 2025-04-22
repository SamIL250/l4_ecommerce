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

    $order_id = random_int(100, 1000);
    $create_order = mysqli_query(
        $conn,
        "INSERT INTO `orders`(`order_id` ,`customer`, `payment_method`) 
        VALUES ('$order_id', '$customer','$payment_method')"
    );

    if($create_order) {
        $create_order_items = mysqli_query(
            $conn,
            "INSERT INTO `order_items`( `order_request`, `item_ordered`, `item_quantity`) 
            VALUES ('$order_id','$product','$product_quantity')"
        );

        if($create_order_items) {
            $update_cart = mysqli_query(
                $conn,
                "DELETE FROM `cart` WHERE `user` = '$customer' AND `product` = '$product'"
            );

            if($update_cart) {
                redirectWithMessage('Order placed successfully!');
            } else {
                redirectWithMessage('Failed to place your order!');
            }
        }
    }
?>