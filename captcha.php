<?php 
session_start();

error_reporting(0);  

$allow_sep = 5; 
if (isset($_SESSION["post_sep"])) 
{ 
if (time() - $_SESSION["post_sep"] < $allow_sep) 
{ 
exit("fast"); 
} 
else 
{ 
$_SESSION["post_sep"] = time(); 
} 
} 
else 
{ 
$_SESSION["post_sep"] = time(); 
} 

$curpos=$_REQUEST['pos'];
$realpos=$_SESSION["pos"];
$con=$_REQUEST['con'];

if($realpos==null)die('old');//过期

if ($con==""||$con==" ")die('3');//内容空

if($curpos<$realpos+5||$curpos>$realpos+50)die('2');//验证错误

file_put_contents('test.txt', $_REQUEST['con']."<br />",FILE_APPEND);
$_SESSION["pos"]=null;
echo 1;//成功
