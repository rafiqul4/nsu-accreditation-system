
<?php
session_start();
require_once("../../connection.php");
$dep=$_SESSION['temp_dep'];
$fn=$_SESSION['temp_fn'];
$search_value=$_POST['name'];
$sql = "SELECT * FROM faculty WHERE department='$dep' and (initial LIKE '%$search_value%' OR name like '%$search_value%' OR email LIKE '%$search_value%' or birthday like '%$search_value%' or department like '%$search_value%')";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		$q2="select * from department where c_initial='".$row["initial"]."'";
        $r2=mysqli_query($con,$q2);
        if(mysqli_num_rows($r2) > 0){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row["initial"]."</td>";
            echo "<td class='td1'>".$row["name"]."</td>";
            echo "<td class='td1'>".$row["department"]."</td>";
            echo "<td class='td1'>"."<center>"."<b><label class=''>"."Current Chairman"."</label></b>"."</center>"."</td>";
            echo "</tr>";
        }
        else if(mysqli_num_rows($r2) == 0){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row["initial"]."</td>";
            echo "<td class='td1'>".$row["name"]."</td>";
            echo "<td class='td1'>".$row["department"]."</td>";
            echo "<td class='td1'>"."<center>"."<button class='set'>"."<a class='lab' href='set_dep.php?in=$row[initial] && d=$row[department] && fn=$row[name]'>"."Set as department chairman"."</a>"."</button>"."</center>"."</td>";
            echo "</tr>";
        }      
	}
}
else{
	echo "<tr classs='tr1'><td class='td1' colspan='7'><center><h3>No results found</h3></center></td></tr>";
}
?>
