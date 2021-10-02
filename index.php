<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Secret Diary</title>
    <?php
    error_reporting(~E_NOTICE);
    include("connect.php");
      session_start();
   error_reporting(0);
    ?>
    
    <script type="text/javascript">
    	var flag=0;
    $('document').ready(function () {
    	var t1="Interested? Sign up now";
    	var t2="Log in using email and password";
    	var n1="login";
    	var n2="signup" 
       $('.toggle').on('click',function(){
           	  var text1=$(this).text();
             var text2=$('#sub').val();
             console.log(text1,text2);
             $("#sub").attr('value',text1);
             $(this).text(text2);
             flag=!(flag); 
             
            
             if(flag==0){
                  $('#change').text(t1);
                  $("#sub").attr('name',n2);
               }
             else{
             	 $('#change').text(t2);
             	 $("#sub").attr('name',n1);
             }
             console.log(flag);
       })
    })
    </script>
  </head>
  <body>
<?php
  $error="";

  	
     
        if(isset($_POST["signup"])){
        	echo '<script>alert("hellosignup")</script>';
            $str="kohurpangla12117dcs064xer";
            $new=md5($str.$_POST['pass']);
             $email= $_POST["email"];
              if(!$_POST["email"]){
          $error.="An email address is required</br>";
        }
        if(!$_POST["pass"]){
          $error.="password is required</br>";
        }

       }
       if(isset($_POST["login"])){
          echo '<script>alert("hellologin")</script>';
            $str="kohurpangla12117dcs064xer";
            $new=md5($str.$_POST['pass']);
             $email= $_POST["email"];
              if(!$_POST["email"]){
          $error.="An email address is required</br>";
        }
        if(!$_POST["pass"]){
          $error.="password is required</br>";
        }

       }  
       
        
?>
    
    <div style="background: url(https://i.postimg.cc/ZnHTP71s/aircraft-airplane-boat-1575833.jpg)" class="page-holder bg-cover">

  <div class="container py-5 ">
    <header class="text-center text-white py-5">
      <h1 class="display-0 font-weight-bold mb-1">Secret Diary</h1>
      <p class="lead mb-1"  >Store your thoughts permanently and securely.</p>
      <p class="font-italic" id="change">Interested? Sign up now
      </p>
      
            <?php
      if(isset($_POST["signup"])){
              if($error!=""){
      echo'<div class="alert alert-danger container " id="my" role="alert" >'.$error.'</div> <br>';
       }
       else{    
                      $email=$_POST["email"];
              
              	     $insert ="INSERT INTO `users`( `email`, `password`) VALUES ('$email','$new')";
              	     if(!mysqli_query($conn,$insert)){
                            $error="<p>Could not sign you Up</p>";
                       }
                       else{
                       	 $_SESSION['email']=$email;
                         $_SESSION['str']="signup";
                       header('location:Diary.php');

                   }
                            
          }   
      }
      ?>
      <?php
      if(isset($_POST["login"])){
              if($error!=""){
      echo'<div class="alert alert-danger container " id="my" role="alert" >'.$error.'</div> <br>';
       }
       else{    
               $email=$_POST["email"];        
              $query="SELECT * FROM `users` WHERE email='$email' ";
              $result= mysqli_query($conn,$query);
               $row=mysqli_fetch_array($result);
               if(isset($row)){
                   echo '<script>alert("helloquery")</script>';
                  if($new== $row['password']){
                     $_SESSION['email']=$email;
                     $_SESSION['str']="login";
                     { echo "<script> location.replace('Diary.php'); </script>";}
                  }
                  else{
                     $error.="Password not correct ";
                  }
                   if($error!=""){
      echo'<div class="alert alert-danger container " id="my" role="alert" >'.$error.'</div> <br>';}
               }
               else{
            $error="none such account found";
            if($error!=""){
      echo'<div class="alert alert-danger container " id="my" role="alert" >'.$error.'</div> <br>';}
           }
                            
          }   
      }
      ?>
      
      <div class="container" id="form">
      	<form action="#" method="post" >
    	 <div class="form-group">
    <input type="email" class="form-control" name=" email"  placeholder="Your Gmail">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name=" pass"  placeholder="Password">
  </div>
  <input type="submit" name="signup" id="sub"style="margin-bottom:10px;"class="btn btn-success" value="Sign up" ></input>
  <div class="toggle">login</div>
   
 
</form>
      	
      </div>
    
    
    </header>

  

  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>