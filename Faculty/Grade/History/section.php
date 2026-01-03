<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../../Images/mini.png'>
<link rel="stylesheet" href="../../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../CSS/bootstrap.min.css">
</head>
<body>
<center>
<?php 
session_start(); 
$sem=$_SESSION['tsem'];
?>
</br>
<?php
require_once("../../../connection.php");
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
    <th class='th1'>Semester</th>
    <th class='th1'>room</th>
    <th class='th1'>time</th>
    <th class='th1'></th>
    </tr>
    <?php
    while($row=mysqli_fetch_assoc($result)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row['c_code']."</td>";
    echo "<td class='td1'>".$row['section']."</td>";
    echo "<td class='td1'>".$row['semester']."</td>";
    echo "<td class='td1'>".$row['room']."</td>";
    echo "<td class='td1'>".$row['time']."</td>";
    $sec=$row['c_code'].".".$row['section']." ".$row['semester'];
    $q1="SELECT * from assessment where section='$sec'";
    $r1=mysqli_query($con,$q1);
    if(mysqli_num_rows($r1)>0){
        echo "<td class='td1'>
        <button class='set'><a class='lab' href='temp_session.php?co=$row[c_code] && sec=$row[section] && se=$row[semester]'>Check</a></button>
        </td>";
    }
    else if(mysqli_num_rows($r1)==0){
        echo "<td class='td1'>
        <b>Unsubmitted</b>
        </td>";
    }
    echo "</tr>";
    }
}
else{
    echo "<h3 class='lev'>No section was assigned to you</h3>";
}
?>
</table>
<br>
<button class='aback'><a class='lab' href='semester.php'>Back</a></button>
</center>
</body>
<script>
    function sure(){
        return confirm("If you want to resubmit your grade, your grade sheet record and CO Assesment Report will be removed.\n\n Are you sure you want to Resubmit?")
    }
</script>
</html>