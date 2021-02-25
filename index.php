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

    $flash->success("FlashMcQueen");
    $flash->success("Hello world");
    $flash->success("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt");
    $flash->error("Lorem ipsum dolor sit amet, consectetur gfdhgdfhgfhgfj gfhgfj hgfj hgjhjezzgf gerynt");
    $flash->info("Lorem ipsum dolor sit amet, consectetur gfdhgdfhgfhgfj gfhgfj hgfj hgjhjezzgf gerynt", false);
    $flash->custom("Salut, je suis particulier perso.", '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 24v-7h-23v-7h-1v14h1v-2h22v2h1zm-20-12c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm19 4c0-1.657-1.343-3-3-3h-13v3h16zm-11-15.999c-3.169 0-6 2.113-6 5.003 0 1.025.37 2.032 1.023 2.812.027.916-.511 2.228-.997 3.184 1.302-.234 3.15-.754 3.989-1.268.709.173 1.388.252 2.03.252 3.542 0 5.954-2.418 5.954-4.98.001-2.906-2.85-5.003-5.999-5.003zm-.888 7h-2.291v-.492l1.251-1.815v-.01h-1.159v-.683h2.156v.527l-1.224 1.789v.011h1.267v.673zm4.047 0h-3.188v-.674l1.741-2.379v-.014h-1.712v-.933h3v.717l-1.604 2.341v.016h1.763v.926z"/></svg>', '#1565C0');


    $flash->display();

    ?>
</body>

<script src="flashmcqueen.js"></script>


</html>