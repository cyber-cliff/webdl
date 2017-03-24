<?php

include "dl/config.php";
include "password.php";
enforce("/login");

?>

<html>
    <head>
        <title>Web Downloader</title>
        <?php include "dl/includes.php"; ?>
    </head>
    <body>
        <div id="navigation">
            <span>Downloader</span>
            <a href="/login/logout.php">Logout</a>
            <a href="/download/">Download</a>
        </div>
        <table>
            <?php
                $files = scandir(STORAGE);
                usort($files, function($a, $b) {
                    return filectime($a) > filectime($b);
                });

                foreach ($files as $file) {
                    if ($file == "." or $file == "..") continue;

                    $path = STORAGE . "/" . $file;
                    $url = "/storage/" . rawurlencode($file);
                    $info = pathinfo($path);
                    echo "<tr>";
                    echo "<td><a href='$url'>" . $info["filename"] . "</a></td>";
                    echo "<td>" . $info["extension"] . "</td>";
                    echo "<td>" . date("Y-m-d", filectime($path)) . "</td>";
                    echo "</tr>\n";

                }
            ?>
        </table>
    </body>
</html>
