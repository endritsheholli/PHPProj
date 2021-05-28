<?php
$db_username = 'root';
$db_password = '';
$db_name = 'somstore';
$db_host = 'localhost';

if($_POST)
{
	$sql_con = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
	
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	
	if(isset($_POST["message"]) &&  strlen($_POST["message"])>0)
	{
		$username = filter_var(trim($_POST["username"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$user_ip = $_SERVER['REMOTE_ADDR'];
		

		if(mysqli_query($sql_con,"INSERT INTO chatting(user, message, ip_address) value('$username','$message','$user_ip')"))
		{
			$msg_time = date('h:i A M d',time());
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$username.'</span><span class="message">'.$message.'</span></div>';
		}
		
		mysqli_query($sql_con,"DELETE FROM chatting WHERE id NOT IN (SELECT * FROM (SELECT id FROM chatting ORDER BY id DESC LIMIT 0, 10) as sb)");
	}
	elseif($_POST["fetch"]==1)
	{
		$results = mysqli_query($sql_con,"SELECT user, message, date_time FROM (select * from chatting ORDER BY id DESC LIMIT 10) chatting ORDER BY chatting.id ASC");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["date_time"])); 
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$row["user"].'</span> <span class="message">'.$row["message"].'</span></div>';
		}
	}
	else
	{
		header('HTTP/1.1 500 Are you kiddin me?');
    	exit();
	}
}