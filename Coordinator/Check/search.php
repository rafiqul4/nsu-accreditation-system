<?php
session_start();
require_once("../../connection.php");
$user=$_SESSION['user'];
$sem=$_SESSION['sem'];
$search_value=$_POST['name'];
$sql = "SELECT s.c_code,s.section,s.semester,s.fac_id
        FROM course as c,section as s 
        WHERE c.coordinator='$user' and c.code=s.c_code and s.semester='$sem' 
        and (c_code LIKE '%$search_value%' OR section = '$search_value' or fac_id LIKE '%$search_value%') and semester like '$sem'";
        
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		if(empty($row['fac_id'])){
			$fac="TBA";
		}
		else{
			$fac=$row['fac_id'];
		}
		echo "<tr class='tr1'><td class='td1'>".$row['c_code']."</td>
        <td class='td1'>".$row['section']."</td><td class='td1'>".$fac."</td>";
		$section=$row["c_code"].".".$row["section"]." ".$row["semester"];
        $query="SELECT * from questions where section='$section'";
        $res=mysqli_query($con,$query);
        $q1="SELECT * from co_aprove where section='$section' and status='Approve'";
        $r1=mysqli_query($con,$q1);
        $q2="SELECT * from co_aprove where section='$section' and status='Disapprove'";
        $r2=mysqli_query($con,$q2);
        $q4="SELECT * from co_aprove where section='$section' and status IS NULL";
        $r4=mysqli_query($con,$q4);
        if(mysqli_num_rows($r1)>0){
            echo "<td class='td1'><b>Approved</b></td>";
        }
        else if(mysqli_num_rows($r2)>0){
            echo "<td class='td1'><b>Disapproved</b></td>";
        }
        else if(mysqli_num_rows($r4)>0){
            echo "<td class='td1'>
            <button class='set'><a href='check.php?s=$section && c=$row[c_code]' class='lab' target='_blank'>Check</a></button>
            <button class='sobuj'><a href='approve.php?s=$section' class='lab'>Approve</a></button>
            <button class='lal'><a href='disapprove.php?s=$section' class='lab'>Disapprove</a></button>
            <b>[Resubmitted]</>
            </td>";
        }
        else if(mysqli_num_rows($res)>0){
            echo "<td class='td1'>
            <button class='set'><a href='check.php?s=$section && c=$row[c_code]' class='lab' target='_blank'>Check</a></button>
            <button class='sobuj'><a href='approve.php?s=$section' class='lab'>Approve</a></button>
            <button class='lal'><a href='disapprove.php?s=$section' class='lab'>Disapprove</a></button>
            </td>";
        }
        else{
            echo "<td class='td1'><b>UNSUBMITTED</b></td>";
        }
        echo "</tr>";
	}
}
else{
	echo "<tr classs='tr1'><td class='td1' colspan='4'><center><h4>No results found</h4></center></td></tr>";
}
?>
