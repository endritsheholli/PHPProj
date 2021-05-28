

<?php
   include('../config.php');

   $upload_image1=$_FILES['picture'][ 'name' ];
   $folder="../images/"; 
   move_uploaded_file($_FILES['picture']['tmp_name'], "$folder".$_FILES['picture']['name']);

$sql="INSERT INTO product (productName, Category_ID, Model,Type, Warehouse_ID, Description,Price, Picture) 
VALUES ('$_POST[name]', '$_POST[select]', '$_POST[model]', '$_POST[type]', '$_POST[WH]', '$_POST[ml]', '$_POST[price]', '$upload_image1')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  header("location: add_Product.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 

