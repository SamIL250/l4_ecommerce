<div class="px-32 py-20">
    <p class="text-2xl font-bold text-gray-600">My Cart</p>
    <div class="grid grid-cols-12 gap-4 my-10">
        <div class="col-span-8 p-20 grid grid-cols-2 gap-4">
            <?php
                $user_id = $_SESSION['user']['user_id'];
                $cart_items = mysqli_query(
                    $conn,
                    "SELECT * FROM cart 
                    INNER JOIN products ON cart.product = productS.product_id
                    WHERE user = '$user_id'"
                );

                if(mysqli_num_rows($cart_items) > 0) {
                    foreach($cart_items as $data) {
                        ?>
                            <div>
                                <div class="grid gap-5 border border-gray-100 rounded-md relative">
                                    <a href="./lib/services/cart/remove_item.php?product_id=<?=$data['product']?>&&user_id=<?=$data['user']?>" class="absolute right-[-5px] top-[-5px] cursor-pointer"><img src="./lib/assets/icons/remove.png" class="w-[30px]" alt=""></a>
                                    <div class="flex justify-center p-2">
                                        <a href="cart-product-details?product_id=<?=$data['product_id']?>">
                                            <img src="<?=$data['product_image'] ?>" class="w-[80%]" alt="ps 5">
                                        </a>
                                    </div>
                                    <div class="bg-[white] rounded-md border-gray-200 p-4">
                                        
                                        <div class="flex justify-between">
                                            <p><?php echo $data['product_name'] ?> (<?=$data['cart_product_quantity']?>)</p>
                                            <p class="font-bold text-md"><?php echo $data['product_price'] ?> Frw</p>
                                        </div>
                                        <div class="flex items-center justify-between gap-3 my-3">
                                            <button class="border border-gray-300 py-1 px-6 rounded-md bg-[whitesmoke]">Bargain</button>
                                            <?php
                                                if(isset($_SESSION['user'])) {
                                                    ?>
                                                        <a href="checkout?product_id=<?=$data['product_id']?>" class="flex items-center border border-gray-200 shadow-sm rounded-md px-3 py-[6px]">Checkout</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <a href="./lib/services/cart/add_cart.php?product_id=<?=$data['product_id']?>?>" class="flex items-center border border-gray-200 shadow-sm rounded-md px-3 py-[1px]">Add <img src="./lib/assets/icons/cart.png" class="w-[30px]" alt="" srcset=""></a>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    echo "No items in your cart";
                }

                

            ?>
        </div>
        <div class="col-span-4 p-10 border border-gray-300 rounded-md ">
            <?php
                $product_id = $_GET['product_id'];

                if(empty($product_id)) {
                   ?>
                   <div class="h-100 flex items-center justify-center">
                        <p class="bg-red-100 text-red-700 py-3 px-5 rounded-md">no items found</p>
                   </div>
                   <?php   
                } else {
                    $product = mysqli_query(
                        $conn,
                        "SELECT * FROM cart 
                        INNER JOIN products ON cart.product = productS.product_id
                        WHERE user = '$user_id'
                        AND product_id = '$product_id'"
                    );
    
                    // print_r($product);
                    foreach($product as $product_detail) {
                        ?>
                            <div>
                                <p class="font-bold text-xl text-gray-600"><?=$product_detail['product_name'] ?></p>
                                <img src="<?=$product_detail['product_image']?>" alt="">
                                <p class="border-l-3 pl-4 border-gray-300 max-h-[20vh] overflow-y-scroll my-4"><?=$product_detail['product_description']?></p> 
                                <div class="flex justify-between border p-3 rounded-md border-gray-200 shadow-sm">
                                    <p class="text-2xl text-gray-600 "><?=$product_detail['cart_product_quantity']?></p>
                                    <p class="text-lg font-bold"><?=$product_detail['cart_product_quantity'] * $product_detail['product_price']?> Frw</p>
                                </div> 
                                <a href="checkout?product_id=<?=$data['product_id']?>" class="">
                                    <div class="mt-4 border border-gray-300 rounded-md p-3 text-center">
                                        <p>Check Out</p>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
    
                }

                

            ?>
        </div>
    </div>
</div>