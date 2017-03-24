<?php

include "dl/config.php";
include "password.php";

$error = null;

if (isset($_POST["password"])) {
    if (login($_POST["password"])) {
        header("Location: /");
    } else $error = "nope";
}

?>

<html>
    <head>
        <title>Login</title>
        <?php include "dl/includes.php"; ?>
    </head>
    <body>
        <h1>Login <?php if ($error) echo "($error)"; ?></h1>
        <form action="/login/" method="post">
            <input name="password" type="password"/>
            <input type="submit"/>
        </form>
    </body>
</html>

