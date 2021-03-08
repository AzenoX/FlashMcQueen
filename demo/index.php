<?php

require "../src/FlashMcQueen.php";

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../src/style.css">
</head>


<body>
<?php


$flash = new FlashMcQueen();

$flash->success("Welcome on our website !", true, ['fadeIn' => 4]);

$flash->custom("We created a cookie to save your session", '<svg class="flashmcqueen_floating" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.078 0c6.587.042 11.922 5.403 11.922 12 0 6.623-5.377 12-12 12s-12-5.377-12-12c3.887 1.087 7.388-2.393 6-6 4.003.707 6.786-2.722 6.078-6zm1.422 17c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-6.837-3c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm11.337-3c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm-6-1c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm-9-3c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm13.5-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-15-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm6-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-3.5-1c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z"/></svg>', '#FF9800', true, [], true);

/*$flash->success("Flash Mc Queen", true, 5, 0.5, 2);
$flash->success("Vous êtes connecté !", false, 2);
$flash->error("Je crois qu'il y a une erreur mec", true);
$flash->warning("Alerte !!!", true);
$flash->info("Je suis une bonne information", true);
$flash->custom("Je suis un custom", '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 19v-7h-23v-7h-1v14h1v-2h22v2h1zm-20-12c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm19 4c0-1.657-1.343-3-3-3h-13v3h16z"/></svg>', '#3F51B5', true);
$flash->custom("Ptn, t'as vu ma couleur et mon icône ???", '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 0v24h-24v-24h24zm-2 22v-16h-20v16h20zm-1-15v14h-11v-14h11zm-14 13v1h-4v-1h4zm2-2v1h-6v-1h6zm8.633-2.615c-.148.049-.308-.031-.357-.179 0 0-1.047-.352-2.291.062l.818 1.269c.085.125.025.295-.116.342l-.555.185-.117.019c-.105 0-.206-.044-.278-.125l-1.123-1.238c-.611.192-1.302-.031-1.534-.606-.053-.133-.08-.273-.08-.415 0-.41.229-.829.727-1.073 2.491-1.223 2.889-2.587 2.889-2.587-.06-.184.077-.372.269-.372.118 0 .228.075.267.193l1.66 4.167c.049.149-.031.308-.179.358zm-8.633.615v1h-6v-1h6zm-2-2.902v1h-4v-1h4zm11.814.856l-.429-.183c.187-.443.205-.959.01-1.44-.196-.482-.566-.839-1.009-1.026l.181-.431c.887.375 1.433 1.24 1.433 2.164 0 .317-.064.629-.186.916zm-.744-.315l-.419-.178c.108-.256.119-.552.005-.83-.111-.277-.326-.483-.581-.59l.178-.421c.362.153.666.445.825.84.16.394.146.815-.008 1.179zm-9.07-2.639v1h-6v-1h6zm0-1.903v1h-6v-1h6zm0-1.097h-6v-1h6v1z"/></svg>', '#6D4C41', true);*/


$flash->display();

?>


<h1>Home Page</h1>


</body>

</html>