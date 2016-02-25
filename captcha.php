<?php 
session_start();

error_reporting(0);  
if($_COOKIE["ck"])die('fast'); //过快

$curpos=$_REQUEST['pos'];
$realpos=$_SESSION["pos"];
$con=$_REQUEST['con'];

setcookie("ck","1",time()+5);//设定cookie存活时间3s

if($realpos==null)die('old');//过期

if ($con==""||$con==" ")die('3');//内容空

if($curpos<$realpos+5||$curpos>$realpos+50)die('2');//验证错误

file_put_contents('test.txt', $_REQUEST['con']."<br />",FILE_APPEND);
$_SESSION["pos"]=null;
echo 1;//成功
