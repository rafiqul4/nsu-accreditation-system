<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>
<body>
<center>
<h3 class='lev'>Set Deadline For Grade Submission</h3>
<?php
require_once("../../connection.php");
session_start();
$dep=$_SESSION['dep'];
$sem=$_SESSION['sem'];
if($sem=="New Semester hasn't enrolled yet "){
    echo "<h4>".$sem."</h4>";
}
else{
    ?>
    <div class="container my-5 w-50 bg-white text-light p-2 rounded-4 shadow-lg">
    <table>
    <tr>
    <?php
    $q1="SELECT * from deadline where dep='$dep'";
    $r1=mysqli_query($con,$q1);
    if(mysqli_num_rows($r1)>0){
        while($row=mysqli_fetch_assoc($r1)){
            echo "<form method='POST'>";
            echo "<td><input class='dna w-100' type='date' name='usdt' value='$row[s_date]' required/></td>";
            echo "<td><input class='dna w-100' type='date' name='uedt' value='$row[e_date]' required/></td>";
            echo "<td><button class='sobuj' name='edit'><i title='UPDATE' class='fa fa-edit'></i></button></td>";
            echo "</form>";
            echo "<td class='td1'><button class='lal'><a class='lab' href='remove.php'><i title='' class='fa fa-close'></i></a></button></td>";
            echo "</tr>";
        }
    }
    else{
        echo "<form method='POST'>";
        echo "<td><input class='dna w-100' type='date' name='sdt' required/></td>";
        echo "<td><input class='dna w-100' type='date' name='edt' required/></td>";
        echo "<td><button class='aback' name='set'>Set</button></td>";
        echo "</form>";
        echo "</tr>";
    }
}
?>
</tr>
</table>
</div>
<button class='aback'><a class='lab' href='../C_Home.php'>Back</a></button>
</center>
<?php
if(isset($_POST['set'])){
    $sdt=$_POST['sdt'];
    $edt=$_POST['edt'];
    $q2="INSERT into deadline values('$dep','$sem','$sdt','$edt')";
    $r2=mysqli_query($con,$q2);
    header("location:deadline.php");
}
else if(isset($_POST['edit'])){
    $sdt=$_POST['usdt'];
    $edt=$_POST['uedt'];
    $q3="UPDATE deadline set s_date='$sdt',e_date='$edt' where dep='$dep' and semester='$sem'";
    $r3=mysqli_query($con,$q3);
    header("location:deadline.php");
}
?>
</body>
</html>