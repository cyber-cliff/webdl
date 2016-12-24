<?php

include "dl/password.php";
enforce("/login");

?>

<html>
    <head>
        <title>Web Downloader</title>
        <?php include "dl/includes.php"; ?>
    </head>
    <body>
        <a href="/download/">Downloader</a>
        <a href="/login/logout.php">Logout</a>
        <ul>
            
        </ul>
    </body>
</html>
