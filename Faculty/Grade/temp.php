<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
</head>
<body>
<?php
session_start();
require_once("../../connection.php");
$code=$_GET['co'];
$_SESSION['fcode']=$_GET['co'];
$sec=$_GET['sec'];
$_SESSION['fsec']=$_GET['sec'];
$sem=$_GET['se'];
$str=$code.".".$sec.$sem;
$section=str_replace(' .','.',$str);
$_SESSION["section"]=$section;
$q1="SELECT * from co_aprove where section='$section' and status='Approve'";
$r1=mysqli_query($con,$q1);
if(mysqli_num_rows($r1)>0){
    $dq3="DELETE from exam_detail where section='$section'";
    $rq3=mysqli_query($con,$dq3);
    $q2="SELECT id FROM marks WHERE section='$section' GROUP by id";
    $r2=mysqli_query($con,$q2);
    $dq10="DELETE from curve where section='$section'";
    $rq10=mysqli_query($con,$dq10);
    if(mysqli_num_rows($r2)>0){
        $dq1="DELETE from marks where section='$section'";
        $rq1=mysqli_query($con,$dq1);
        $dq2="DELETE from full_marks where section='$section'";
        $rq2=mysqli_query($con,$dq2);
        $dq4="DELETE from assessment where section='$section'";
        $rq4=mysqli_query($con,$dq4);
        $dq5="DELETE from co_con where section='$section'";
        $rq5=mysqli_query($con,$dq5);
        $dq6="DELETE from co_marks where section='$section'";
        $rq6=mysqli_query($con,$dq6);
        $dq7="DELETE from co_full_marks where section='$section'";
        $rq7=mysqli_query($con,$dq7);
        $dq8="DELETE from assessment where section='$section'";
        $rq8=mysqli_query($con,$dq8);
        $dq9="DELETE from comment where section='$section'";
        $rq9=mysqli_query($con,$dq9);

        header("location:setup.php");
    }
    else{
        header("location:setup.php");
    }
}
else{
    echo "</br><center><h3 class='lev'>You have to verify Course Outcome</h3></br>";
    echo "<button class='aback'><a class='lab' href='section_list.php'>Back</a></button></center>";
}
?>
</body>
</html>