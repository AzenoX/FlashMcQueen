<?php

require "../src/FlashMcQueen.php";

session_start();


if(isset($_POST['submit'])){
    $flash = new FlashMcQueen();
    $flash->success("Connected !", false, []);

    header('Location: index.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../src/style.css">


<body>
    <h1>Hello world</h1>

    <br><br>

    <form method="post" action="#">
        <input type="text" placeholder="Username" name="username">
        <br><br>
        <input type="password" placeholder="Password" name="password">
        <br><br>
        <button type="submit" name="submit">Send</button>
    </form>

</body>


</html>