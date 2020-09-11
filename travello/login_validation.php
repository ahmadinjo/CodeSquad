<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Chars</title>
</head>
<body>
    <?php
        $url_page = "php_created page/url.php";
        $param1 = "This a string with <>";
        $param2 = "&#?*^$[]+ are bad characters";
        $linktext = "<Click> & learn more";

        $url = "http://localhost/";
        $url .= rawurlencode($url_page);
        $url .= "?" . "param1=" . urlencode($param1);
        $url .= "&" . "param2=" . urlencode($param2);
    ?>

    <a href='<?php echo htmlspecialchars($url); ?>'><?php echo htmlspecialchars($linktext); ?></a>
</body>
</html>