<?php
session_start();
include './config/config.php';

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Commerce</title>
    <?php
    include './lib/components/cdns.php';
    ?>
</head>

<body class="relative">
    <!-- //navbar -->
    <?php
        include './lib/components/navbar.php'; 
        include './lib/components/notifications.php';
    ?>


    <!-- //main contents -->