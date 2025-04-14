<div class="p-32">
    <div class="flex justify-center">
        <div class="shadow-sm border border-gray-300 rounded-md w-[60%] px-10 py-10">
            <p class="text-center text-2xl text-blue-900">Sign Up</p>
            <form method="POST" action="./lib/services/auth/signup.php" class="grid grid-cols-2 gap-5 mt-10">
                
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Full names</label>
                    <input type="text" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="full_name" id="">
                </div>
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Email</label>
                    <input type="email" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="email" id="">
                </div>
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Phone number</label>
                    <input type="tel" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="phone" id="">
                </div>
                
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Home address</label>
                    <input type="text" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="address" id="">
                </div>
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Password</label>
                    <input type="password" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="password" id="">
                </div>
                <div class="grid gap-3">
                    <label class="text-lg font-bold text-gray-600">Confirm password</label>
                    <input type="password" class="border block w-[100%] p-2 border-1 border-gray-300 outline-none focus:border-blue-800 rounded-md focus:shadow-sm" name="confirm_password" id="">
                </div>
                <div class="flex justify-end col-span-2">
                    <button class="bg-blue-900 text-white py-1 px-4 rounded-md border-2 border-blue-800 hover:bg-blue-800 cursor-pointer">Sign In</button>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm text-gray-600">Already have an account? <a href="auth-signin" class="border-b">Sign Up</a></p>
                    <!-- <p class="text-sm text-blue-900"><a href="">Forgot password</a></p> -->
                </div>
            </form>
        </div>

    </div>
</div>