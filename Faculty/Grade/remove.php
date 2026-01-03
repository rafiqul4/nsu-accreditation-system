<?php
require_once("../../connection.php");
session_start();
$section=$_SESSION['section'];
$dq2="DELETE from full_marks where section='$section'";
$rq2=mysqli_query($con,$dq2);
$dq3="DELETE from marks where section='$section' and (exam='CT' or exam='quiz' or exam='MID' or exam='Final' or exam='Assignment' or exam='Presentation' or exam='Project' or exam='VIVA')";
$rq3=mysqli_query($con,$dq3);

$dq4="DELETE from co_con where section='$section'";
$rq4=mysqli_query($con,$dq4);
$dq5="DELETE from co_con where section='$section'";
$rq5=mysqli_query($con,$dq5);
$dq6="DELETE from co_marks where section='$section'";
$rq6=mysqli_query($con,$dq6);
header("location:update_sheet.php");
?>