<?php

include "dl/password.php";

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
        <form action="/login/" method="post">
            <input name="password" type="password"/>
            <input type="submit"/>
            <label name="error"><?php echo $error; ?></label>
        </form>
    </body>
</html>

