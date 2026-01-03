<?php
require_once("../../connection.php");
$sql="SELECT * from faculty";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['initial']."</td>";
    echo "<td class='td1'>".$row['name']."</td>";
    echo "<td class='td1'>".$row['phone_number']."</td>";
    echo "<td class='td1'>".$row['email']."</td>";
    echo "<td class='td1'>".$row['birthday']."</td>";
    echo "<td class='td1'>".$row['department']."</td>";
    echo "<td class='td1'> <a class='del' a href='delete_faculty_process.php?code=$row[initial]'><i title='Update faculties' class='fa fa-close'></i></a></tr>";

}
?>