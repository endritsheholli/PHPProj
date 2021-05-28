<?php include("../config.php");?>
<?php
$delete=$_GET['delete'];
if(empty($delete)){
echo "you didn't select any record";

}else{
$query="delete from category where Category_ID =".$delete."";
$result=mysqli_query($mysqli,$query);
header("location:add_category.php?");
exit();
mysqli_close($mysqli);
}
?>

