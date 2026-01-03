<?php
require_once("../../connection.php");
session_start();
if(isset($_SESSION['special'])){
    $check="select * from faculty";
    $cres=mysqli_query($con,$check);
    if(mysqli_num_rows($cres)>0){
        while($row = mysqli_fetch_assoc($cres)){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row["initial"]."</td>";
            echo "<td class='td1'>".$row["name"]."</td>";
            echo "<td class='td1'>".$row["email"]."</td>";
            echo "<td class='td1'>".$row["department"]."</td>";
            $q1="select * from course where code='$course' and coordinator='$row[initial]'";
            $r1=mysqli_query($con,$q1);
            if(mysqli_num_rows($r1)>0){
                echo "<td class='td1'>"."<center><b>Current Coordinator</b></center>"."</td>";
            }
            else{
                echo "<td class='td1'>"."<center>"."<a class='set lab' href='add?ini=$row[initial]'>"."Set as Admin"."</a>"."</center>"."</td>";
            }
            echo "</tr>";           
        }
    }
}
else{
    header('location: ../ncvisgsgdsogndsksgsnbsnbisnigssdngsincknbkcsnsdgsgjcbxjcbcxbgrjfdjgjfsj/index');
}
?>