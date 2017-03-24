<?php

include("dl/config.php");
include("password.php");
enforce("/login");

/* Assert download directory exists. */
if (!is_dir(STORAGE)) {
    mkdir(STORAGE, 0777, true);
}

/* Check if fields are set and link is valid. */
if (isset($_POST["url"]) and isset($_POST["format"])) {
    if (preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $_POST["url"], $matches)) {

        /* Get the storage path and format. */
        $output = STORAGE . "/" . $_POST["name"] . "." . $_POST["format"];
        $format = " --format " . $_POST["format"];

        /* Generate a command. This ain't secure. */
        $command = "youtube-dl https://youtu.be/$matches[1] -o '$output' $format";

?>

<html>
    <head>
        <title>Downloading...</title>
        <?php include "dl/includes.php"; ?>
    </head>
    <body>

<?php
        /* Echo the command and output. */
        echo "<b>" .$command . "</b><br>";
        echo nl2br(shell_exec($command));

        /* Set the modification time. */
        touch($output);

        /* Redirect. */
        header("Refresh: 5; url=/");

    } else {
        echo "Invalid URL.";
    }
} else {
    echo "Invalid fields.";
}

?>

    </body>
</html>
