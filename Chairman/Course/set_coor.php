<?php
require_once("../../connection.php");
session_start();
$initial=$_GET['ini'];
$course=$_GET['cor'];
$sql="Update course Set coordinator='$initial' where code='$course'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:course_man.php?run=$initial has been set as the Coordinator of $course");
    echo "<button>"."Go Back"."</button>";
}
?>