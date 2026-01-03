<?php
require_once("../../connection.php");
session_start();
$course=$_SESSION['acode'];
$num=$_POST['num'];
for($i=1;$i<=$num;$i++){
    $sql="INSERT into co_id(code,title,wt) values('$course','CO$i',0)";
    $result=mysqli_query($con,$sql);
}
header("location:custom_add.php");
?>