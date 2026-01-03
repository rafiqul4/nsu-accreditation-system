<?php
require_once("../../connection.php");
$section=$_GET['s'];
$q1="SELECT * from co_aprove where section='$section'";
$r1=mysqli_query($con,$q1);
if(mysqli_num_rows($r1)>0){
    $q2="UPDATE co_aprove set status='Disapprove' where section='$section'";
    $r2=mysqli_query($con,$q2);
    header("location:section_list.php");
}
else{
    $sql="INSERT into co_aprove values('$section','Disapprove')";
    $result=mysqli_query($con,$sql);
    header("location:section_list.php");
}
?>