<?php
session_start();
 error_reporting(~E_NOTICE);
 include("connect.php");
if($_POST['ip']){
// $ip = gethostbyname($_POST['ip']);

$ip = $_POST['ip'];
$email=$_SESSION['email'];
$insert ="UPDATE `users` SET `message` = '$ip' WHERE `users`.`email` = '$email';";
              	    mysqli_query($conn,$insert);
echo $ip;
}
else{
	echo "string";
}
?>