<?php
session_start();
$_SESSION['f_course']=$_GET['c'];
$code=$_SESSION['f_course'];
$sec=$_GET['s'];
$str=$code.".".$sec." ".$_SESSION['sem'];
$_SESSION["section"]=str_replace(' .', '.', $str);
header("location:exam_wt.php");
?>