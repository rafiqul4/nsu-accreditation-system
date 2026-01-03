<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>
<body>
<center>

<?php
require_once("../../connection.php");
session_start();
$sem=$_SESSION['sem'];
$fac=$_SESSION['user'];
$query="SELECT * from section where fac_id='$fac' and semester='$sem'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
?>
<h3 class='lev'>Your Sections</h3>
<br>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>Course Code</th>
<th class='th1'>Section</th>
<th class='th1'>room</th>
<th class='th1'>time</th>
<th class='th1'></th>
<th class='th1'>Status</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($result)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['c_code']."</td>";
    echo "<td class='td1'>".$row['section']."</td>";
    echo "<td class='td1'>".$row['room']."</td>";
    echo "<td class='td1'>".$row['time']."</td>";
    $sec=$row['c_code'].".".$row['section']." ".$sem;
    $q1="SELECT * from questions where section ='$sec'";
    $r1=mysqli_query($con,$q1);
    $q2="SELECT * from co_aprove where section='$sec' and status='Approve'";
    $r2=mysqli_query($con,$q2);
    $q3="SELECT * from co_aprove where section='$sec' and status='Disapprove'";
    $r3=mysqli_query($con,$q3);
    $q4="SELECT * from co_aprove where section='$sec' and status IS NULL";
    $r4=mysqli_query($con,$q4);
    if(mysqli_num_rows($r2)>0){
        echo "<td class='td1'><button class='set'><a class='lab' href='utemp.php?c=$row[c_code] && s=$row[section]'>Check</a></button></td>";
        echo "<td class='td1'><b>Approved</b></td>";
    }
    else if(mysqli_num_rows($r3)>0){
        echo "<td class='td1'>
        <button class='set'><a class='lab' href='dtemp.php?c=$row[c_code] && s=$row[section]'>New Verification</a></button>
        </td>";
        echo "<td class='td1'><b>Disapproved</b></td>";
    }
    else if(mysqli_num_rows($r4)>0){
        echo "<td class='td1'><button class='set'><a class='lab' href='utemp.php?c=$row[c_code] && s=$row[section]'>Check</a></button></td>";
        echo "<td class='td1'><b>Pending after resubmission</b></td>";
    }
    else if(mysqli_num_rows($r1)>0){
        echo "<td class='td1'><button class='set'><a class='lab' href='utemp.php?c=$row[c_code] && s=$row[section]'>Check</a></button></td>";
        echo "<td class='td1'><b>Pending</b></td>";
    }
    else{
        echo "<td class='td1'><button class='set'><a class='lab' href='temp.php?c=$row[c_code] && s=$row[section]'>CO Verification</a></button></td>";
        echo "<td class='td1'><b>Unsubmitted</b></td>";
    }
    echo "</tr>";
}
}
else{
    echo "<h3 class='lev'>No section has been assigned for you</h3>";
}
?>
</table>
<br>
<button class='aback'><a class='lab' href='../home.php'>Back</a></button>
</center>
</body>
</html>