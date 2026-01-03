<?php
session_start();
require_once("../../connection.php");
$sem=$_SESSION['sem'];
$sql="SELECT * from section where semester='$sem'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
	if(empty($row['fac_id'])){
			$fac="TBA";
	}
	else{
			$fac=$row['fac_id'];
	}
    $q1="SELECT * from student_id where code='$row[c_code]' and section='$row[section]' and semester='$row[semester]'";
    $r1=mysqli_query($con,$q1);
    $av=$row['seat']-mysqli_num_rows($r1);
    echo "<tr class='tr1'><td class='td1'>".$row['c_code']."</td>";
    echo "<td class='td1'>".$row['section']."</td>";
    echo "<td class='td1'>".$row['semester']."</td>";
    echo "<td class='td1'>".$row['seat']."</td>";
    echo "<td class='td1'>".$av."</td>"; 
    echo "<td class='td1'>".$fac."</td>";
    if(mysqli_num_rows($r1)>0){
        echo "<td class='td1'>ENROLLED</td><td><a class='up' a href='temp_sec.php?code=$row[c_code] && sec=$row[section] && seat=$row[seat]'><i title='Update Students' class='fa fa-edit'></i></a></tr>";
    }
    else{
        echo "<td class='td1'>UNENROLLED</td><td><a class='plus' a href='add_st.php?code=$row[c_code] && sec=$row[section] && seat=$row[seat]'><i title='Add Students' class='fa fa-plus'></i></a></tr>";
    }
}
?>