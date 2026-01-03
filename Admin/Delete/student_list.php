<?php
require_once("../../connection.php");
$sql="SELECT * from student";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['id']."</td>";
    echo "<td class='td1'>".$row['name']."</td>";
    echo "<td class='td1'>".$row['phone_number']."</td>";
    echo "<td class='td1'>".$row['email']."</td>";
    echo "<td class='td1'> <a class='del' a href='delete_student_process.php?code=$row[id]'><i title='Update Students' class='fa fa-close'></i></a></tr>";

}
?>