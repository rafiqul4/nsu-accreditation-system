<?php
require_once("../../connection.php");
session_start();
$sem=$_SESSION['sem'];
$code=$_SESSION['scode'];
$sec=$_SESSION['sec'];
$seat=$_SESSION['seat'];
$id=$_GET['di'];
$sql="DELETE from student_id where code='$code' and section=$sec and semester='$sem' and st_id=$id";
$result=mysqli_query($con,$sql);
if($result){
    $i=1;
    $query="SELECT * from student_id where code='$code' and section=$sec and semester='$sem' ORDER BY st_id ASC";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($res)){
        $uq="UPDATE student_id set sl=$i where st_id=$row[st_id] and code='$code' and section=$sec and semester='$sem'";
        $ur=mysqli_query($con,$uq);
        $i++;
    }
    header("location:update_st.php");
}
?>