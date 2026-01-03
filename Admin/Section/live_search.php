
<?php
session_start();
require_once("../../connection.php");
$sem=$_SESSION['sem'];
$search_value=$_POST['name'];
$sql = "SELECT * FROM section WHERE (c_code LIKE '%$search_value%' OR section = '$search_value' or 
        fac_id LIKE '%$search_value%') and semester like '$sem'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		$q1="SELECT * from student_id where code='$row[c_code]' and section='$row[section]' and semester='$row[semester]'";
    	$r1=mysqli_query($con,$q1);
		$av=$row['seat']-mysqli_num_rows($r1);
		if(empty($row['fac_id'])){
			$fac="TBA";
		}
		else{
			$fac=$row['fac_id'];
		}
		echo "	<tr class='tr1'><td class='td1'>".$row['c_code']."</td><td class='td1'>".$row['section']."</td><td class='td1'>".$row['semester']."</td>
		<td class='td1'>".$row['seat']."</td>"."<td class='td1'>".$av."</td>"."<td class='td1'>".$fac."</td>";
		if(mysqli_num_rows($r1)>0){
			echo "<td class='td1'>ENROLLED</td><td><a class='up' a href='temp_sec.php?code=$row[c_code] && sec=$row[section] && seat=$row[seat]'><i title='Update Students' class='fa fa-edit'></i></a></tr>";
		}
		else{
			echo "<td class='td1'>UNENROLLED</td><td><a class='plus' a href='add_st.php?code=$row[c_code] && sec=$row[section] && seat=$row[seat]'><i title='Add Students' class='fa fa-plus'></i></a></tr>";
		}
	}
}
else{
	echo "<tr classs='tr1'><td class='td1' colspan='7'><center><h3>No results found</h3></center></td></tr>";
}
?>
