<div class="px-32 py-20">
    <p class="text-2xl font-bold text-gray-600">My Cart</p>
    <div class="grid grid-cols-4 gap-4 my-10">
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
                                <div class="flex justify-center p-2"><img src="<?=$data['product_image'] ?>" class="w-[80%]" alt="ps 5"></div>
                                <div class="bg-[white] rounded-md border-gray-200 p-4">
                                    <p><?php echo $data['product_name'] ?> (<?=$data['cart_product_quantity']?>)</p>
                                    <div class="flex items-center justify-between gap-3 my-3">
                                        <button class="border border-gray-300 py-1 px-6 rounded-md bg-[whitesmoke]">Bargain</button>
                                        <?php
                                            if(isset($_SESSION['user'])) {
                                                ?>
                                                    <a href="" class="flex items-center border border-gray-200 shadow-sm rounded-md px-3 py-[6px]">Checkout</a>
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
</div>