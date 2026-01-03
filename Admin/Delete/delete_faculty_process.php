<?php
require_once("../../connection.php");
$id=$_GET["code"];
$sql="Delete From faculty where initial='$id'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:delete_faculty.php");
}

?>