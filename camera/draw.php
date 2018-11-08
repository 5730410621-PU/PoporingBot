
 <?php
//error_reporting(E_ALL);
 //function addText($img,$imgPath){

 //Header("Content-type: text/html; charset=utf-8");
 $string = "#ประเทศกูมี"; // String
 $im = ImageCreateFromJpeg("temp_img/8813850836867.png"); // Path Images
 $color = ImageColorAllocate($im, 255, 0, 0); // Text Color
 $pxX = (Imagesx($im) - 6.5 * strlen($string)) / 2; // X
 $pxY = Imagesy($im) - 20; // Y

 $font = imageloadfont('/THSarabunNew/THSarabunNew.ttf');
 //imagestring($im, $font, $pxX, $pxY, $string, $color);
 imagettftext ( $im,20 ,0, $pxX, $pxY ,$color , $font , $string );
 imagePng($im, "8813850836867.png");
 ImageDestroy($im);
 echo "#ประเทศกูมี";
 //}
