<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>
<body>
<center>
<?php 
session_start(); 
?>
<b><h2 class='lev'>You have to submit grades by <?php echo $_SESSION['deadline'] ?></h3></b></br>
<?php
require_once("../../connection.php");
$sem=$_SESSION['sem'];
$fac=$_SESSION['user'];
$query="SELECT * from section where fac_id='$fac' and semester='$sem'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    ?>
    <h3 class='lev'>Your Sections</h3>
    <?php if(@$_GET['complete']==true){ ?> <div class="alert alert-primary w-25" role="alert"> <?php echo $_GET['complete']?></div> <?php }?>
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
    $q1="SELECT * from assessment where section='$sec'";
    $r1=mysqli_query($con,$q1);
    if(mysqli_num_rows($r1)>0){
        $stat="Submitted";
    }
    else{
        $stat="Unsubmitted";
    }
    if(mysqli_num_rows($r1)>0){
        echo "<td class='td1'>
        <button class='onno' onclick='return sure()'><a class='lab' href='temp.php?co=$row[c_code] && sec=$row[section] && se=$row[semester]'>Resubmit Grade</a></button>
        </td>";
    }
    else if(mysqli_num_rows($r1)==0){
        $q2="SELECT * from marks where section='$sec'";
        $r2=mysqli_query($con,$q2);
        if(mysqli_num_rows($r2)>0){
            echo "<td class='td1'>
            <button class='sobuj'><a class='lab' href='new_temp.php?co=$row[c_code] && sec=$row[section] && se=$row[semester]'>Edit</a></button>
            <button class='lal' onclick='return sure()'><a class='lab' href='temp.php?co=$row[c_code] && sec=$row[section] && se=$row[semester]'>New Submission</a></button>
            </td>";
        }
        else{
            echo "<td class='td1'>
            <button class='set'><a class='lab' href='temp.php?co=$row[c_code] && sec=$row[section] && se=$row[semester]'>Submite Grade</a></button>
            </td>";
        }
    }
    echo "<td class='td1'><b>".$stat."</b></td>";
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
<script>
    function sure(){
        return confirm("If you want to resubmit your grade, your grade sheet record and CO Assesment Report will be removed.\n\n Are you sure you want to Resubmit?")
    }
</script>
</html>