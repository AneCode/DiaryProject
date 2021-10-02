<?php
$user="root";
$password="";
$db="mydiary";
$V=false;
 $conn= mysqli_connect("localhost",$user,$password,$db);
 if($conn)
 {
          $V=true;
 }
 else
  	{die("connection failed because".mysqli_connect_error());
 }
 ?>
   
