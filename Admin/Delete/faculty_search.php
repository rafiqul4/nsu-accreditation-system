
<?php
session_start();
require_once("../../connection.php");
$search_value=$_POST['name'];
$sql = "SELECT * FROM faculty WHERE (initial LIKE '%$search_value%' OR name like '%$search_value%' or 
        phone_number LIKE '%$search_value%' OR email LIKE '%$search_value%' or birthday like '%$search_value%' or department like '%$search_value%')";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['initial']."</td>";
    echo "<td class='td1'>".$row['name']."</td>";
    echo "<td class='td1'>".$row['phone_number']."</td>";
    echo "<td class='td1'>".$row['email']."</td>";
    echo "<td class='td1'>".$row['birthday']."</td>";
    echo "<td class='td1'>".$row['department']."</td>";
    echo "<td class='td1'> <a class='del' a href='delete_faculty_process.php?code=$row[initial]'><i title='Update faculties' class='fa fa-close'></i></a></tr>";

	}
}
else{
	echo "<tr classs='tr1'><td class='td1' colspan='7'><center><h3>No results found</h3></center></td></tr>";
}
?>
