<?php
session_start();
 error_reporting(0);
 include("connect.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			alert('hello');
			$('#searchip').change(function(){
				// alert('he');
				// console.log(e.which);
				$.ajax({
					type:'POST',
					url:'add.php',
					data:"ip="+$('#searchip').val(),
					success:function(m){
						
						alert('succuss')

					}
					,
					error:function(){
						alert('error')
					}
				});
			})
        });
	</script>
</head>
<body>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">MY Dairy</a>
  <form class="form-inline" method="post">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout" >Logout</button>
  </form>
</nav>	
<textarea type="text" name="text" id="searchip" style=" width :100%; height:600px;"/></textarea>
</body>
<?php
 echo "<script>alert('hello5".$_SESSION['email']."')</script>";
 if(isset($_POST['logout'])){
   echo "<script>alert('hello5".$_SESSION['email']."')</script>";
   header('location:index.php');
   session_destroy();
 }
 if($_SESSION['str']=="login"){
   $email=$_SESSION['email'];
    $query="SELECT * FROM `users` where email='$email' ";
              $result=mysqli_query($conn,$query);
              $row=mysqli_fetch_array($result);
              $r=$row['message'];
              if(mysqli_query($conn,$query)){
                echo '<script>alert("telloquery");</script>';
              }
              echo "<script>
              var element = document.getElementById('searchip');
               element.innerHTML='$r';
              
              </script>";
 }
?>
</html>