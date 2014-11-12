<?php
if (isset($_GET['param'])){
header ("Content-type: image/jpeg");
$im = imagecreatetruecolor(640, 640);
$ink = imagecolorallocate($im, 123, 123, 233);
//рисуем круг
imagefilledellipse($im,320,320,600,600,$ink);
$ink = imagecolorallocate($im, 255, 255, 255);
//линии координатной сетки
imageline($im,320,20,320,620,$ink);
imageline($im,620,320,20,320,$ink);

imageAntiAlias($im, true);
imagejpeg($im);
}




