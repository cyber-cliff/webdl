<?php

include "dl/config.php";
include "password.php";
enforce("/login");

?>

<html>
    <head>
        <title>Downloader</title>
        <?php include "dl/includes.php"; ?>
        <script type="text/javascript">
            function cancel() { window.location = "/"; }
        </script>
    </head>
    <body>
        <h1>Download</h1>
        <form method="post" action="/download/download.php">
            <input type="text" name="url" placeholder="url"/>
            <input type="text" name="name" placeholder="name"/>
            <input type="text" name="format" placeholder="format" value="m4a"/>
            <input type="submit"/>
            <input type="button" value="back" onclick="cancel()">
        </form>
    </body>
</html>
