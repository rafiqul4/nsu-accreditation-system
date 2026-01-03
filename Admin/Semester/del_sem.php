<?php 
require_once("../../connection.php");
$season=$_GET['ds'];
$year=$_GET['dy'];
$query="DELETE FROM semester WHERE season='$season' and year=$year";
$result=mysqli_query($con,$query);
if($result){
    header("location:sem_list.php?del=$season $year has been removed");
}
?>