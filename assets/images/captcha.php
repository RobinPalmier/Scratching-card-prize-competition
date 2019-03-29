<?php
session_start();

//Stockage de la valeur du captcha
$captcha = rand(100,9999);
$_SESSION['captcha'] = $captcha;
extract($_SESSION);

//creation de l'image:
$dimensionImage = imagecreatetruecolor(50,25);

#imagecolorallocate(): 4 argument : l'image dans laquelle je travaille, la valeur du composant rouge, vert, bleu
$background = imagecolorallocate($dimensionImage,47,47,47);
$texteColor = imagecolorallocate($dimensionImage,236,167,37);

#imagefill() :
imagefill($dimensionImage,0,0,$background);

#imagestring() :
imagestring($dimensionImage,20,5,5,$captcha,$texteColor);
header("Content-type: image/png");
imagepng($dimensionImage);
imagedestroy($dimensionImage);
?>