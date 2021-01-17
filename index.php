<?php
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'OpenSans-Regular.ttf';

    $h = 200;
    $w = 530;
    $ctx = imagecreate($w, $h);

    $rates = json_decode(file_get_contents('https://kodaktor.ru/j/rates'));

    $wRect = 90;
    $black = imagecolorallocate($ctx, 0,0,0);
    $red = imagecolorallocate($ctx, 255,0,0);

    array_walk($rates, function($x, $i) use ($wRect, $ctx, $h, $red, $black, $font){
        $text = $x->name;

        imagefilledrectangle($ctx, $i*$wRect, $h , 80+$i*$wRect, ($h - $x ->sell)-20, $red);
        imagettftext($ctx, 12, 0, 20 + $i*$wRect, $h-6, $black, $font, $text);

        });
    imagepng($ctx, './imagefilledrectangle.png');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img</title>
</head>
<body>
    <img src="imagefilledrectangle.png" alt="task4">
</body>
</html>