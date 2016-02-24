<?php 
session_start();
header("Content-type: image/png");
$image=imagecreatefrompng('bg.png') or die('bg Cannot Be Opened');
$sub=imagecreatefrompng('sub.png') or die('sub Cannot Be Opened');
$pos=rand(0,227);
$_SESSION["pos"]=$pos;
imagecopy($image,$sub,$pos,0,0,0,51,21);
imagepng($image);
imagedestroy($sub);
imagedestroy($image);