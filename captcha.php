<?php 
session_start();
error_reporting(0);  
if($_COOKIE["ck"])die('fast'); 
setcookie("ck","1",time()+3);//设定cookie存活时间3s


$curpos=$_REQUEST['pos'];
$realpos=$_SESSION["pos"];
$con=$_REQUEST['con'];

if ($realpos==null) {
	echo 'old';//过期
}else if($curpos>$realpos+5&&$curpos<$realpos+50){
	if ($con!=''&&$con!=" ") {
		file_put_contents('test.txt', $_REQUEST['con']."<br />",FILE_APPEND);
		$_SESSION["pos"]=null;
		echo 1;//成功
	}else{
		echo 3;//内容空
	}
}else{
	echo 2;//验证错误
}