<?php
session_start();

function generateCaptchaText($length = 6) {
    $characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $captchaText = '';
    for ($i = 0; $i < $length; $i++) {
        $captchaText .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captchaText;
}

function createCaptchaImage($text) {
    $width = 150;
    $height = 50;
    
    $image = imagecreatetruecolor($width, $height);
    
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocate($image, 0, 102, 204);
    
    imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);
    
    // Ajout de lignes de distorsion
    for ($i = 0; $i < 5; $i++) {
        $lineColor = imagecolorallocate($image, rand(150, 200), rand(150, 200), rand(150, 200));
        imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
    }
    
    // Ajout de points aléatoires
    for ($i = 0; $i < 50; $i++) {
        $pointColor = imagecolorallocate($image, rand(150, 200), rand(150, 200), rand(150, 200));
        imagesetpixel($image, rand(0, $width), rand(0, $height), $pointColor);
    }
    
    // Ajout du texte avec une police plus grande
    $fontSize = 5;
    imagestring($image, $fontSize, 30, 15, $text, $textColor);
    
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

// Génération du nouveau captcha
$captchaText = generateCaptchaText();
$_SESSION['captcha_text'] = $captchaText;
createCaptchaImage($captchaText); 