<?php include("../config.php");?>
<?php
$delete=$_GET['delete'];
if(empty($delete)){
echo "you didn't select any record";

}else{
$query="delete from product where Product_ID=".$delete."";
$result=mysqli_query($mysqli,$query);
header("location: add_product.php?");
exit();
mysqli_close($mysqli);
}
?>

