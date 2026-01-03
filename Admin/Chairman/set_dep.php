<?php
require_once("../../connection.php");
$initial=$_GET['in'];
$dep=$_GET['d'];
$fn=$_GET['fn'];
$sql="Update department Set c_initial='$initial',name='$fn' where dep='$dep'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:chair_manage.php?run=$fn has been set as the chairman of the $dep Department");
    echo "<button>"."Go Back"."</button>";
}
?>