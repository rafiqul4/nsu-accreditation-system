<?php
session_start();
$_SESSION['view']=$_GET['user'];
$code=$_GET['co'];
$_SESSION['fcode']=$_GET['co'];
$sec=$_GET['sec'];
$_SESSION['fsec']=$_GET['sec'];
$sem=$_GET['se'];
$_SESSION['fsem']=$sem;
$section=$code.".".$sec.$sem;
$section=str_replace(' .','.',$section);
$_SESSION['tsection']=$section;
header("location:grade.php");
?>