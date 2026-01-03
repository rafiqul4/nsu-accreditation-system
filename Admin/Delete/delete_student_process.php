<?php
require_once("../../connection.php");
$id=$_GET["code"];
$sql="Delete From student where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:delete_student.php");
}

?>