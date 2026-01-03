
<?php
require_once("../../connection.php");
$search_value=$_POST['name'];
$sql = "SELECT * FROM student WHERE (id LIKE '%$search_value%' OR name like '%$search_value%' or 
        phone_number LIKE '%$search_value%' OR email LIKE '%$search_value%' )";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['id']."</td>";
    echo "<td class='td1'>".$row['name']."</td>";
    echo "<td class='td1'>".$row['phone_number']."</td>";
    echo "<td class='td1'>".$row['email']."</td>";
    echo "<td class='td1'> <a class='del' a href='delete_student_process.php?code=$row[id]'><i title='Update Students' class='fa fa-close'></i></a></tr>";

	}
}
else{
	echo "<tr classs='tr1'><td class='td1' colspan='7'><center><h3>No results found</h3></center></td></tr>";
}
?>
