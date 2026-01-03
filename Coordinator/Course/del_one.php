<?php
require_once("../../connection.php");
session_start();
$course=$_SESSION['ucode'];
$title=$_GET['co'];
$sql="DELETE from co_id where code='$course' and title='$title'";
$result=mysqli_query($con,$sql);
if($result){
    $query="UPDATE co_id set wt=0 where code='$course'";
    $res=mysqli_query($con,$query);
    header("location:update_co.php");
}
?>