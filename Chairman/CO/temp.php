<?php
session_start(); 
$_SESSION['csem']=$_GET['sem'];
header("location:section.php");
?>
