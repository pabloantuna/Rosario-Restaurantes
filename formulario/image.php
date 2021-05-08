<?php 
/*header("Content-type: image/png"); 
$string = "abcdefghijklmnopqrstuvwxyz0123456789"; 
for($i=0;$i<5;$i++){ 
    $pos = rand(0,36); 
    $str .= $string{$pos}; 
}
$img_handle = ImageCreate (110, 32) or die ("Es imposible crear la imagen"); 
$back_color = ImageColorAllocate($img_handle,102,102,153); 
$txt_color = ImageColorAllocate($img_handle,255,255,255); 
ImageString($img_handle, 31, 30, 5, $str, $txt_color); 
ob_clean();
Imagepng($img_handle); 
session_start(); 
$_SESSION['img_number'] = $str;*/



/*// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(400, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = 'Testing...';
// Replace path by your own font path
$font = 'arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
ob_clean();

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);*/

$string = "abcdefghijklmnopqrstuvwxyz0123456789"; 
for($i=0;$i<5;$i++){ 
    $pos = rand(0,36); 
    $str .= $string{$pos}; 
}

$ImageText1Small = imagecreate( 148, 16 );
$ImageText1Large = imagecreate( 148, 16 );
$ImageText2Small = imagecreate( 308, 40 );
$ImageText2Large = imagecreate( 308, 40 );
$ImageFinal = imagecreate( 175, 100 );

$backgroundColor1 = imagecolorallocate($ImageText1Small, 102,102,153);
$textColor1 = imagecolorallocate($ImageText1Small, 255,255,255);

$backgroundColor2 = imagecolorallocate($ImageText2Small, 102,102,153);
$textColor2 = imagecolorallocate($ImageText2Small, 255,255,255);

imagestring( $ImageText2Small, 5, 13, 5, $str,  $textColor2 );

imagecopyresampled($ImageText1Large, $ImageText1Small, 0, 0, 0, 0, 148, 16, 74, 8);
imagecopyresampled($ImageText2Large, $ImageText2Small, 0, 0, 0, 0, 308, 40, 154, 20);

$ImageText1Large = imagerotate ( $ImageText1Large, 20, $backgroundColor1 );
$ImageText2Large = imagerotate ( $ImageText2Large, -5, $backgroundColor2 );

$ImageText1W = imagesx($ImageText1Large);
$ImageText1H = imagesy($ImageText1Large);

$ImageText2W = imagesx($ImageText2Large);
$ImageText2H = imagesy($ImageText2Large);

imagecopymerge($ImageFinal, $ImageText1Large, 350, 20, 0, 0, $ImageText1W, $ImageText1H, 100);
imagecopymerge($ImageFinal, $ImageText2Large, 20, 20, 0, 0, $ImageText2W, $ImageText2H, 100);
ob_clean();
header( "Content-type: image/png" );
imagepng($ImageFinal);
session_start();
$_SESSION['img_number'] = $str;

?>  
