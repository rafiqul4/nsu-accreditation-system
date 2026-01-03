<?php
require_once("../../connection.php");
session_start();
$initial=$_GET['ini'];
$sem=$_SESSION['sem'];
$code=$_SESSION['code'];
$sec=$_SESSION['sec'];
$sql="UPDATE section set fac_id='$initial' where c_code='$code' and section=$sec and semester='$sem'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:section_man.php?done=$initial has been appointed as faculty of $code section $sec $sem");
}
?>