<?php
    require_once("../../connection.php");
    $code=$_GET['dc'];
    $query="DELETE FROM co_id WHERE code='$code'";
    $result=mysqli_query($con,$query);
    if($result){
        header("location:course_list.php?del=Course outcome of $code has been removed");
    }
?>