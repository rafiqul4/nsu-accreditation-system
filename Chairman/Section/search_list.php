<?php
session_start();
require_once("../../connection.php");
$sem=$_SESSION['sem'];
$search_value=$_POST['name'];
$dep=$_SESSION['dep'];
$sql = "SELECT * FROM section as s,course as c WHERE (c_code LIKE '%$search_value%' OR section = '$search_value' or fac_id like '%$search_value%') and s.c_code=c.code and c.department='$dep' and semester like '$sem'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		$q1="SELECT * from student_id where code='$row[c_code]' and section='$row[section]' and semester='$row[semester]'";
    	$r1=mysqli_query($con,$q1);
		if(empty($row['fac_id'])){
			$fac="TBA";
		}
		else{
			$fac=$row['fac_id'];
		}
		echo "	<tr class='tr1'><td class='td1'>".$row['c_code']."</td><td class='td1'>".$row['section']."</td><td class='td1'>".$row['semester']."</td>
		<td class='td1'>".$row['seat']."</td>"."</td><td class='td1'>".$fac."</td>";
		echo "<td class='td1'><button class='set'><a class='lab' href='temp_sec.php?code=$row[c_code] && sec=$row[section] && fac=$fac'>Appoint Faculty</a></button></td>";
	}
}
else{
	echo "<tr><td colspan='6'><center>No result's found</center></td></tr>";
}
?>
