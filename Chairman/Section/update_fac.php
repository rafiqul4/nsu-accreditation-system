<html>
<head>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
</head>
<body>
<center>
</br>
<?php
require_once("../../connection.php");
session_start();
$fac=$_SESSION['fac'];
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
$code=$_SESSION['code'];
$sec=$_SESSION['sec'];
$sql="SELECT * from faculty where department='$dep'";
$result=mysqli_query($con,$sql);
?>
<table class='tab1 w-50'>
<tr class='tr1'>
<th class='th1'>Initial</th>
<th class='th1'>Name</th>
<th class='th1'>Deparmtent</th>
<th class='th1'></th>
</tr>
<?php
while($row=mysqli_fetch_assoc($result)){
    $tq="SELECT * from section where c_code='$code' and section=$sec and semester='$sem'";
    $rt=mysqli_query($con,$tq);
    $qrow=mysqli_fetch_assoc($rt);
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['initial']."</td>";
    echo "<td class='td1'>".$row['name']."</td>";
    echo "<td class='td1'>".$row['department']."</td>";
    if($row['initial']==$qrow['fac_id']){
        echo "<td class='td1'><b>Currently Appointed</b></td>";
    }
    else{
        echo "<td class='td1'><button class='set'><a class='lab' href='set_fac.php?ini=$row[initial]'>Appoint</a></button></td>";  
    }
    echo "</tr>";
}
?>
</table>
</br>
<button class='aback'><a class='lab' href='section_man.php'>Cancel</a></button>
</center>
</body>
</html>