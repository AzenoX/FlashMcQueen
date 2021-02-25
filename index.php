<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "FlashMcQueen.php";


    session_start();


    $flash = new FlashMcQueen();

    $flash->success("Flash Mc Queen");
    $flash->success("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt");
    $flash->error("Lorem ipsum dolor sit amet, consectetur gfdhgdfhgfhgfj gfhgfj hgfj hgjhjezzgf gerynt");
    $flash->info("Lorem ipsum dolor sit amet, consectetur gfdhgdfhgfhgfj gfhgfj hgfj hgjhjezzgf gerynt");


    $flash->display();

    ?>
</body>


</html>