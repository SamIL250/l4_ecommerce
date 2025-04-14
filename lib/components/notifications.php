<?php
if (isset($_SESSION['notification'])) {
    $success_notifications = [
        "Your account was created successfully!, Sign In"
    ];
    if (in_array($_SESSION['notification'], $success_notifications)) {
        ?>
            <div class="notification min-w-[300px] p-3 absolute index-1 text-green-700 rounded-md border-1 border-green-400 top-20 bg-green-100 right-5">
                <?= $_SESSION['notification'] ?>
            </div>
        <?php
    } else {
        ?>
            <div class="notification min-w-[300px] p-3 absolute index-1 text-red-700 rounded-md border-1 border-red-400 top-20 bg-red-100 right-5">
                <?= $_SESSION['notification'] ?>
            </div>

        <?php
    }
        
    unset($_SESSION['notification']);
}
?>

<script>
    var notification = document.querySelector('.notification');
    setTimeout(() => {
        notification.style.display = 'none';
    }, 4000)
</script>
