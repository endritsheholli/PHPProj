<?php 

	include("config.php"); 
	
    session_start();
     if($_SERVER["REQUEST_METHOD"] == "POST") 
{
	 $myusername = mysqli_real_escape_string($mysqli,$_POST['Username']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['Password']); 

      $sql="SELECT Cust_Id from customer where Email='$myusername' and Password= '$mypassword'";
	  $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
    if($count == 1)
    {
    $_SESSION['login_username']=$myusername;
         $_SESSION['logged_in'] = true;
	       header("location: home.php");

    }
    else
    {
	   header('Location: Sign In.php');
	}

}
?>
