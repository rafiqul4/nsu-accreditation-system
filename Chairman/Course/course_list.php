<?php
require_once("../../connection.php");
session_start();
$dep=$_SESSION['dep'];
$sql="SELECT * from course where department='$dep'";
$result=mysqli_query($con,$sql);
while($r1=mysqli_fetch_assoc($result)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>". $r1['code']."</td>";
    echo "<td class='td1'>". $r1['title']."</td>";
    echo "<td class='td1'>". $r1['credit']."</td>";
    $query="select * from co_id where code='$r1[code]'";
    $res=mysqli_query($con,$query);
    $rrow=mysqli_num_rows($res);
    if($rrow>0){
        echo "<td class='td1'>";
        while($r=mysqli_fetch_assoc($res)){
            $final=$r['title']."&nbsp;&nbsp;&nbsp;"; 
            echo $final;
        }
        echo "</td>";
    } 
    else{
        echo "<td><center>N/A</center></td>";
    }
    if($r1['coordinator']==NULL){
        $co="N/A";
    }
    else $co=$r1['coordinator'];
    echo "<td class='td1'>". $co."</td>";
    echo "<td class='td1'><button class='set'><a class='lab' href='coordinator.php?coor=$r1[code]'>Appoint a New Coordinator</a></button></td>";
    echo "<td class='td1'><button class='set'><a class='lab' href='wc.php?wc=$r1[code]'>Weightage</a></button></td>";
    echo "<td class='td1'><a class='up' href='temp_course.php?cu=$r1[code] && tu=$r1[title] && c=$r1[credit]'><i title='UPDATE' class='fa fa-edit'></i></a></td>";
    echo "<td class='td1'><a class='del' href='delete_course.php?dc=$r1[code]'><i title='DELETE' class='fa fa-close'></i></a></td>";
    echo "</tr>";
}
?>
                