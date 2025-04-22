<?php
$page_name = basename($_SERVER['PHP_SELF']);
// echo $page_name;

?>

<div class="shadow-sm border border-gray-300 px-32 py-4 flex items-center justify-between">
    <p class="text-3xl font-bold text-gray-600">Logo</p>
    <div class="flex gap-10">
        <a href="home" class="<?php echo $page_name == 'home.php' ? 'bg-blue-800 px-3 py-1 text-white' : '' ?>">Home</a>
        <a href="dashboard" class="<?php echo $page_name == 'dashboard.php' ? 'bg-blue-800 px-3 py-1 text-white': '' ?>">Dashboard</a>
        <a href="">Settings</a>
        <a href="">Sign In</a>
    </div>
</div>