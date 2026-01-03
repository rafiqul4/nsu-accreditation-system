<?php
    require_once("../../connection.php");
    $code=$_GET['dc'];
    $query1="DELETE FROM course WHERE code='$code'";
    $result1=mysqli_query($con,$query1);
    $query2="DELETE FROM co_id WHERE code='$code'";
    $result2=mysqli_query($con,$query2);
    if($result1 && $result2){
        header("location:course_man.php?del=$code has been removed");
    }
?>