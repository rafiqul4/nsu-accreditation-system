<?php
require_once("../../../connection.php");
session_start(); 
$sem=$_SESSION['tsem'];
$fac=$_SESSION['user'];
$search_value=$_POST['name'];
$dep=$_SESSION['dep'];
$query="SELECT * from section as s,course as c where (c_code LIKE '%$search_value%' OR section = '$search_value' OR fac_id like '%$search_value%') and s.c_code=c.code and c.department='$dep' and semester='$sem'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        if($row['fac_id']==NULL){
            $fac="N/A";
        }
        else{
            $fac=$row['fac_id'];
        }
        echo "<tr class='tr1'>";
        echo "<td class='td1'>".$row['c_code']."</td>";
        echo "<td class='td1'>".$row['section']."</td>";
        echo "<td class='td1'>".$row['semester']."</td>";
        echo "<td class='td1'>".$row['room']."</td>";
        echo "<td class='td1'>".$row['time']."</td>";
        echo "<td class='td1'>".$fac."</td>";
        $sec=$row['c_code'].".".$row['section']." ".$row['semester'];
        $q1="SELECT * from assessment where section='$sec'";
        $r1=mysqli_query($con,$q1);
        if(mysqli_num_rows($r1)>0){
            echo "<td class='td1'>
            <button class='set'><a class='lab' href='new_temp.php?co=$row[c_code] && sec=$row[section] && se=$row[semester] && user=$row[fac_id]'>Check</a></button>
            </td>";
        }
        else if(mysqli_num_rows($r1)==0){
            echo "<td class='td1'>
            <b>Unsubmitted</b>
            </td>";
        }
        echo "</tr>";
    }
}
else{
	echo "<tr><td colspan='7'><center>No result's found</center></td></tr>";
}
?>