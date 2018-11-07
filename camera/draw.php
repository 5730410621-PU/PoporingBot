
<?php

//function addText($img,$imgPath){

    Header("Content-type: text/html; charset=utf-8");
    $string = "#ประเทศกูมี"; // String
    $im = ImageCreateFromJpeg("temp_img/8813850836867.png"); // Path Images
    $color = ImageColorAllocate($im, 255, 0, 0); // Text Color
    $pxX = (Imagesx($im) - 6.5 * strlen($string))/2; // X
    $pxY = Imagesy($im)- 20; // Y
   

    ImageString($im, 5, $pxX, $pxY, $string, $color); 
    imagePng($im,"8813850836867.png");
    ImageDestroy($im);
    
    echo "#ประเทศกูมี";

//}
