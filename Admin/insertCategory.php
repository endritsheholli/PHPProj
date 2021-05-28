<?php
   include('../config.php');

   $upload_image1=$_FILES['picture'][ 'name' ];
   $folder="../images/"; 
   move_uploaded_file($_FILES['picture']['tmp_name'], "$folder".$_FILES['picture']['name']);

$sql="INSERT INTO category (Category_Name, Discription, Picture) 
VALUES ('$_POST[categoryName]', '$_POST[description]', '$upload_image1')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  header("location: add_category.php");
  

 mysqli_close($mysqli);
?> 
 <?php
 echo "1 record added";
 ?>