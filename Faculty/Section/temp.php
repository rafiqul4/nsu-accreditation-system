<?php
require_once("../../connection.php");
session_start();
$_SESSION['f_course']=$_GET['c'];
$code=$_SESSION['f_course'];
$sec=$_GET['s'];
$str=$code.".".$sec." ".$_SESSION['sem'];
$_SESSION["section"]=str_replace(' .', '.', $str);
$q1="DELETE from exam_co where section='$section'";
$r1=mysqli_query($con,$q1);
$q2="DELETE from questions where section='$section'";
$r2=mysqli_query($con,$q2);
header("location:exam_no.php");
?>