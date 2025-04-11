<div class="px-32 py-10 grid grid-cols-2 gap-5">
    <div class="grid gap-5">
        <p class="text-2xl font-bold text-blue-800">Our Products</p>
        <p class="text-justify text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, culpa consequuntur incidunt amet necessitatibus asperiores.</p>
        <div>
            <button class="border border-gray-200 py-2 px-5 hover:bg-blue-800 hover:text-white cursor-pointer duration-300 transition rounded-full text-gray-600">Explore</button>
        </div>
    </div>
    <div class="grid grid-cols-2 border-1 border-gray-50 rounded-md " >

        <?php
            $products = mysqli_query(
                $conn,
                "SELECT product_image FROM products LIMIT 2"
            );

            foreach($products as $product) {
                ?>
                    <div class="p-3">
                        <img src="<?=$product['product_image']?>" class="w-[70%]" alt="">
                    </div>
                <?php
            }
        ?>
    </div>
</div>