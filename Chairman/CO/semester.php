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
require_once("../../connection.php");
session_start();
$user=$_SESSION['user'];
$sql="SELECT * FROM `semester` ORDER BY year DESC,serial desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    ?>
    <br>
    <h3 class='lev'>Select A Semester</h3>
    <table class='tab1'>
    <?php
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr class='tr1'>";
        echo "<td class='td1'>".$row['season']."</td>";
        echo "<td class='td1'>".$row['year']."</td>";
        $sem=$row['season']." ".$row['year'];
        echo "<td class='td1'><button class='set'><a class='lab' href='temp.php?sem=$sem'>Select</a></button></td>";
        echo "</tr>";
    }
    ?>
    </table>
    <br>
    <?php
}
else{
    ?>
    <h2 class='lev'>No History of Grade submission found</h2>
    <?php
}
?>
<button class='aback'><a class='lab' href='../C_Home.php'>Back</a></button>
</center>
</body>
</html>