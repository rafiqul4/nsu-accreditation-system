<?php
require_once("../../../connection.php");
session_start();
$section=$_SESSION['section'];
$dq5="DELETE from co_full_marks where section='$section'";
$rq5=mysqli_query($con,$dq5);
$dq6="DELETE from co_marks where section='$section'";
$rq6=mysqli_query($con,$dq6);
header("location:co_sheet.php");
?>
