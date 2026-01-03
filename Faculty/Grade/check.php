<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>
<body>
<center>
</br>
<?php
require_once("../../connection.php");
session_start();
$dep=$_SESSION['fdep'];
$sem=$_SESSION['sem'];
$c_date=date("Y-m-d");
$sql="SELECT * from deadline where dep='$dep' and semester='$sem'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $sdt=$row['s_date'];
        $edt=$row['e_date'];
    }
    if($c_date<$sdt){
        echo "<h2 class='lev'>Grade Submission hasn't started yet. It will start on ".$sdt."</h2>";
    }
    else if($c_date>$edt){
        echo "<h2 class='lev'>Grade Submission has ended</h2>";
    }
    else if($c_date>=$sdt && $c_date<=$edt){
        header("location:section_list.php");
        $_SESSION['deadline']=$edt;
    }
}
else{
    echo "<h2 class='lev'>Grade Submission hasn't started yet</h2>";
}
?>
</br>
<button class='aback'><a class='lab' href='../home.php'>Back</a></button>
</center>
</body>
</html>