<?php
session_start();
$_SESSION['cview']=$_GET['user'];
$code=$_GET['co'];
$_SESSION['ccode']=$_GET['co'];
$sec=$_GET['sec'];
$_SESSION['csec']=$_GET['sec'];
$sem=$_GET['se'];
$_SESSION['csem']=$sem;
$section=$code.".".$sec.$sem;
$section=str_replace(' .','.',$section);
$_SESSION['csection']=$section;
header("location:check.php");
?>