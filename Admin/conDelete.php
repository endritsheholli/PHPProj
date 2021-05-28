<?php include("../config.php");?>
<?php
$delete= $_GET['delete'];
if(empty($delete)){
echo "you didn't select any record";

}else{
$query="delete from contact where contact_id=".$delete."";
$result=mysqli_query($mysqli,$query);
header("location: index.php?");
exit();
mysqli_close($mysqli);
}
?>