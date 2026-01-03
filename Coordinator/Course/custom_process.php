<?php
require_once("../../connection.php");
session_start();
$course=$_SESSION['acode'];
$q1="SELECT * from co_id where code='$course'";
$r1=mysqli_query($con,$q1);
$row1=mysqli_num_rows($r1);
$i=1;
while($i<=$row1){
    while($ro1=mysqli_fetch_assoc($r1)){
        $q3="SELECT * from co_id where code='$course' and title='".$_POST["a1$i"]."'";
        $r3=mysqli_query($con,$q3);
        $q2="UPDATE co_id set Description='".$_POST["a2$i"]."' , PO='".$_POST["a3$i"]."', 
        bloom='".$_POST["a4$i"]."', method='".$_POST["a5$i"]."' , tool='".$_POST["a6$i"]."'
        where code='$course' and title='".$ro1["title"]."' ";
        $r2=mysqli_query($con,$q2);
        if(mysqli_num_rows($r3)==0){
            $q4="UPDATE co_id set title='".$_POST["a1$i"]."' where code='$course' and title='".$ro1["title"]."' ";
            $r4=mysqli_query($con,$q4);
            $i++;
        }
        else{
            $i++;
        }
    }
}
$sum=0;
for($k=1;$k<=$row1;$k++){
    $sum=$sum+$_POST["a7$k"];
}
if($sum==100){
    $q6="SELECT * from co_id where code='$course'";
    $r6=mysqli_query($con,$q6);
    $l=1;
    while($l<=$row1){
        while($ro2=mysqli_fetch_assoc($r6)){
            $q5="UPDATE co_id set wt='".$_POST["a7$l"]."' where code='$course' and title='".$ro2["title"]."' ";
            $r5=mysqli_query($con,$q5);  
            $l++;
        }
    }
    header("location:course_list.php?done=Course outcome added for $course");
}
else{
    header("location:custom_add.php?fail=Failed Update co weightage as total sum of weightages is not equal to 100%");
}
?>