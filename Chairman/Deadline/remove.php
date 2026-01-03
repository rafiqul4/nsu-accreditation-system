<?php
require_once("../../connection.php");
session_start();
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
$query="DELETE from deadline where dep='$dep' and semester='$sem'";
$result=mysqli_query($con,$query);
header("location:deadline.php");
?>