<?php
    session_start();
    include '../../../config/config.php';

    $product_id = $_GET['product_id'];
    $user_id = $_GET['user_id'];
    $product_quantity = 1;

    function redirectWithMessage($message) :void {
        $_SESSION['notification'] = $message;
        header('location:../../../products');
        exit();
    }

    $check_cart = mysqli_query(
        $conn,
        "SELECT * FROM cart WHERE user = '$user_id' AND product = '$product_id'"
    );

    $selected_product_quantity = mysqli_fetch_array($check_cart)['cart_product_quantity'];
    $updated_quantity = $selected_product_quantity + 1;

    if(mysqli_num_rows($check_cart) > 0 ) {
        $update_product_quantity = mysqli_query(
            $conn,
            "UPDATE cart 
            SET cart_product_quantity = '$updated_quantity'
            WHERE user = '$user_id' AND product = '$product_id'"
        );

        if($update_product_quantity) {
            redirectWithMessage("Product quantity updated");
        }
    } else {
        $add_to_cart = mysqli_query(
            $conn,
            "INSERT INTO cart(user, product, cart_product_quantity) 
            VALUES ('$user_id', '$product_id', '$product_quantity')"
        );
    
        
    
        if(!$add_to_cart) {
            redirectWithMessage("Failed to add product to your cart!, Try again.");
        }
        redirectWithMessage("Product added to cart.");
    }
    
   
