<?php
if (isset($_GET['k'])&&isset($_GET['mas'])){
$mas=  unserialize($_GET['mas']);

header ("Content-type: image/jpeg");
$im = imagecreatetruecolor(640, 640);
$ink = imagecolorallocate($im, 123, 123, 233);
//рисуем круг
imagefilledellipse($im,320,320,600,600,$ink);
$white = imagecolorallocate($im, 255, 255, 255);//белый
$coord=array(320,320,330,330,140,380,310,330,40,200,360,180,330,290,100,100);
/*foreach ($mas as $val){
    switch ($val[0]){
        case "2": break;
        case "3": $coord[2]=60;$coord[3]=340; break;
        case "4": $coord[6]=100;$coord[7]=200; break;
        case "5": $coord[10]=360;$coord[11]=180; break;
    }
}*/
$firebreak=imagecolorallocate($im, 178, 34, 34);//красный
$orange=imagecolorallocate($im, 255, 165, 0);//оранжевый
$green=imagecolorallocate($im, 124, 252, 0);//зеленый
$bisque=imagecolorallocate($im, 255, 228, 196);//бисквитный
$blue=imagecolorallocate($im, 0, 0, 255);//синий
//зона для 2-х баллов
imagefilledarc($im, 320, 320, 600, 600, 0, 90 , $firebreak, IMG_ARC_PIE);
//зона для 3-х баллов
imagefilledarc($im, 320, 320, 600, 600, 90, 180 , $orange, IMG_ARC_PIE);
//зона для 4-х баллов
imagefilledarc($im, 320, 320, 600, 600, 180, 270 , $green, IMG_ARC_PIE);
//зона для 5-х баллов
imagefilledarc($im, 320, 320, 600, 600, 270, 360 , $bisque, IMG_ARC_PIE);
//линии координатной сетки
imageline($im,320,20,320,620,$white);
imageline($im,20,320,620,320,$white);
imagefilledpolygon($im, $coord, 8, $blue);
imageAntiAlias($im, true);
imagejpeg($im);
}




