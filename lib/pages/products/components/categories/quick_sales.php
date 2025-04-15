<div class="px-32 py-10">
    <div class="flex justify-between">
        <p class="text-xl font-bold text-gray-600">Quick Sales</p>
        <span>View more</span>
    </div>
    <div class="grid grid-cols-2 my-10 gap-4">
        <div class="bg-[whitesmoke] p-10 rounded-md border border-gray-300 relative">
            <img src="./lib/assets/images/jordan 4.webp" alt="" srcset="">
            <div class="absolute top-5 right-5 bg-white p-1 rounded-md">
                <img src="./lib/assets/images/jordan 4-2.webp" class="w-[100px]" alt="" srcset="">
            </div>
        </div>
        <div class="grid grid-cols-2 px-4 gap-3">
            <?php
               $products = mysqli_query(
                $conn,
                "SELECT * FROM products LIMIT 2"
               );
            //    print_r($products);
            foreach($products as $data) {
                ?> 
                    <div>
                        <div class="grid gap-5 border border-gray-100 rounded-md">
                            <div class="flex justify-center"><img src="<?=$data['product_image'] ?>" class="w-[80%]" alt="ps 5"></div>
                            <div class="bg-[white] rounded-md border-gray-200 p-4">
                                <p><?php echo $data['product_name'] ?></p>
                                <div class="flex items-center justify-between gap-3 my-3">
                                    <button class="border border-gray-300 py-1 px-6 rounded-md bg-[whitesmoke]">Bargain</button>
                                    <?php
                                        if(isset($_SESSION['user'])) {
                                            ?>
                                                <a href="./lib/services/cart/add_cart.php?product_id=<?=$data['product_id']?>&&user_id=<?=$_SESSION['user']['user_id']?>" class="flex items-center border border-gray-200 shadow-sm rounded-md px-3 py-[1px]">Add <img src="./lib/assets/icons/cart.png" class="w-[30px]" alt="" srcset=""></a>
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
            ?>
        </div>
    </div>
</div>