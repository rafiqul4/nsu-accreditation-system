<?php
require_once("../../connection.php");
session_start();
$dep=$_SESSION['temp_dep'];
$fn=$_SESSION['temp_fn'];
$sql="SELECT * from faculty where department = '$dep'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
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
?>