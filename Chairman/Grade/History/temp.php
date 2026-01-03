<?php
session_start(); 
$_SESSION['tsem']=$_GET['sem'];
header("location:section.php");
?>
