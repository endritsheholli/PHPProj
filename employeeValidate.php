<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
      
      $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']); 
      
      $sql = "SELECT Employee_ID FROM employee WHERE Username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_username']=$myusername;
         $_SESSION['logged_in'] = true;
         header("location: http://localhost:8080/Buki17/Admin/index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
