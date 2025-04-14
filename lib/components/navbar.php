<div class="border border-gray-300 sticky top-0 bg-white shadow-sm py-4 px-32">
    <div class="flex items-center justify-between">
        <p class="text-3xl font-bold text-gray-500">Logo</p>

        <?php
        if (isset($_SESSION['user'])) {
            ?>
                <!-- //signed in  -->
                <div class="flex gap-5 items-center">
                    <a href="index">Home</a>
                    <a href="products">Products</a>
                    <a href="">Cart</a>
                    <a href="">Orders</a>
                    <a href="">Account</a>
                    <a href="auth-signin" class="border py-1 px-4 rounded-full border-gray-300 bg-[whitesmoke] duration-300 transition hover:shadow-md "><?=$_SESSION['user']['email']?></a>
                    <a href="./lib/services/auth/signout.php" class="border-b">Logout</a>
                </div>
            <?php
        } else{
            ?>
                <!-- //signed out -->
                <div class="flex gap-5 items-center">
                    <a href="index">Home</a>
                    <a href="products">Products</a>
                    <a href="">About Us</a>
                    <a href="">Services</a>
                    <a href="">Contact Us</a>
                    <a href="auth-signin" class="border py-1 px-4 rounded-full border-gray-300 bg-[whitesmoke] duration-300 transition hover:shadow-md ">Sign In</a>
                </div>
            <?php
        }
        ?>
       


    </div>
</div>