<?php
$product_id = $_GET['product_id'];
?>

<div class="px-32 py-20">
    <p class="text-2xl font-bold text-gray-600">Checkout</p>
    <form action="" method="POST" class="gap-4 grid grid-cols-12 my-10">
        <div class="col-span-8">
            <div class="mx-20">
                <?php
                    $user_id = $_SESSION['user']['user_id'];
                    // echo $user_id;
                    $select_user = mysqli_query(
                        $conn,
                        "SELECT * FROM users WHERE user_id = '$user_id'"
                    );

                    // print_r($select_user);

                    foreach($select_user as $user){
                        ?>
                            <div class="grid grid-cols-2 gap-7">
                                <input type="hidden" value="<?=$product_id?>" name="product_id" id="">
                                <input type="hidden" value="<?=$_SESSION['user']['user_id']?>" name="user_id" id="">
                                <div class="grid gap-3">
                                    <label class="text-lg font-bold text-gray-600">Username</label>
                                    <input type="text" value="<?=$user['username']?>" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="username" id="">
                                </div>
                                <div class="grid gap-3">
                                    <label class="text-lg font-bold text-gray-600">Email</label>
                                    <input type="email" value="<?=$user['email']?>" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="email" id="">
                                </div>
                                <div class="grid gap-3">
                                    <label class="text-lg font-bold text-gray-600">Phone</label>
                                    <input type="tel" value="<?=$user['phone_number']?>" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="phone" id="">
                                </div>
                                <div class="grid gap-3">
                                    <label class="text-lg font-bold text-gray-600">Delivery address</label>
                                    <input type="text" value="<?=$user['delivery_address']?>" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="address" id="">
                                </div>
                            </div>
                        <?php
                    }
                ?>
                <div class="my-16">
                    <p class="text-lg font-bold text-gray-600">Select your payment method</p>
                    <div class="grid grid-cols-2 gap-4 my-5">
                        <div class="pod border bg-[whitesmoke] p-3 border-gray-300 cursor-pointer rounded-md">
                            <p>Pay On Delivery (POD)</p>
                        </div>
                        <div class="flutterWave border text-white bg-orange-500 p-3 cursor-pointer border-gray-300 rounded-md">
                            <p>FlutterWave</p>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" value="None" class="paymentInput border" required name="payment_method" id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="px-5 col-span-4">
            <?php
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
                                <input type="hidden" value="<?=$product_detail['cart_product_quantity']?>" name="cart_product_quantity" id="">
                                <p class="text-2xl text-gray-600 "><?=$product_detail['cart_product_quantity']?></p>
                                <p class="text-lg font-bold"><?=$product_detail['cart_product_quantity'] * $product_detail['product_price']?> Frw</p>
                            </div> 
                            <div  class="flex justify-end">
                                <button class="mt-4 border cursor-pointer border-gray-300 rounded-md p-3 text-center">
                                    <p>Proceed</p>
                                </button>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </form>
</div>

<script>
    // const pod = document.querySelector('.pod');
    // const flutterWave = document.querySelector('.flutterWave');
    // const paymentInput = document.querySelector('.paymentInput');
    // pod.addEventListener('click', () => {
    //     paymentInput.value = 'pod'
    //     pod.classList.add('border-3')
    //     flutterWave.classList.remove('border-3')
    // })

    // flutterWave.addEventListener('click', () => {
    //     paymentInput.value = 'flutterwave'
    //     flutterWave.classList.add('border-3')
    //     pod.classList.remove('border-3')
    // })
    
    const pod = document.querySelector('.pod');
    const flutterWave = document.querySelector('.flutterWave');
    const paymentInput = document.querySelector('.paymentInput');

    pod.addEventListener('click' , () => {
        paymentInput.value = 'pod';
        pod.classList.add('border-3');
        flutterWave.classList.remove('border-3');
    });

    flutterWave.addEventListener('click', () => {
        paymentInput.value = 'flutterwave';
        flutterWave.classList.add('border-3');
        pod.classList.remove('border-3');
    })

















</script>