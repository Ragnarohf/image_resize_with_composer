<?php

require_once("./vendor/autoload.php");

use Gumlet\ImageResize;

$image = new ImageResize("./img/panda.jpg");
var_dump($image);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>