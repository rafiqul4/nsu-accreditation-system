<?php
session_start();
require_once("../../connection.php");
$sem=$_SESSION['sem'];
$dep=$_SESSION['dep'];
$sql="SELECT * from section as s,course as c where s.c_code=c.code and c.department='$dep' and semester='$sem'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
	if(empty($row['fac_id'])){
			$fac="TBA";
	}
	else{
			$fac=$row['fac_id'];
	}
    echo "<tr class='tr1'><td class='td1'>".$row['c_code']."</td>";
    echo "<td class='td1'>".$row['section']."</td>";
    echo "<td class='td1'>".$row['semester']."</td>";
    echo "<td class='td1'>".$row['seat']."</td>";
    echo "<td class='td1'>".$fac."</td>";
    echo "<td class='td1'><button class='set'><a class='lab' href='temp_sec.php?code=$row[c_code] && sec=$row[section] && fac=$fac'>Appoint Faculty</a></button></td>";
}
?>