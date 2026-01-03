<?php
require_once("../../../connection.php");
require_once("../../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];

$po="SELECT PO from co_id where code='$code' group by po ASC";
$rpo=mysqli_query($con,$po);
$arr_po=array();
while($roo1=mysqli_fetch_assoc($rpo)){
    array_push($arr_po,$roo1['PO']);
}
$st_q="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
$st_res=mysqli_query($con,$st_q);
while($st_row=mysqli_fetch_assoc($st_res)){
    echo $st_row['st_id']."<br>";
    foreach($arr_po as $po){
        echo $po."</br>";
        $arr_co=array();
        $q1="SELECT * from co_id where code='$code' and po='$po'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($arr_co,$row1['title']);
        }
        $arr_st=array();
        $arr_tot=array();
        foreach($arr_co as $co){
            echo $co." ";
            $q2="SELECT * from co_full_marks where section='$section' and id='$st_row[st_id]' and co='$co'";
            $r2=mysqli_query($con,$q2);
            $row2=mysqli_fetch_assoc($r2);
            array_push($arr_st,$row2['mark']);
            array_push($arr_tot,$row2['tot']);
        }
        $arr_mark=convertion($arr_tot,100,$arr_st);
        echo "</br>";
        foreach($arr_mark as $mark){
            echo $mark." ";
        }
        $po_mark=avg($arr_mark);
        echo $po_mark;
        echo "</br>";
        $q3="INSERT into po values('$section',$st_row[st_id],'$po',$po_mark)";
        $r3=mysqli_query($con,$q3);
    }
}
header("location:summary.php");
?>