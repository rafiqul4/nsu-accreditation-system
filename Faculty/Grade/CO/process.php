<?php 
require_once("../../../connection.php");
require_once("../../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];

$q1="SELECT co from exam_co where section='$section' group by co";
$r1=mysqli_query($con,$q1);
$arr=array();
while($row1=mysqli_fetch_assoc($r1)){
    $q2="SELECT * from exam_co where section='$section' and co='$row1[co]'";
    $r2=mysqli_query($con,$q2);
    $ro1=mysqli_num_rows($r2);
    array_push($arr,$row1['co']);
}
foreach($arr as $a){
    $q1="SELECT * FROM exam_co WHERE section='$section' and co='$a'
        ORDER by 
            CASE
                WHEN exam LIKE 'CT%' THEN 1
                WHEN exam LIKE 'Q%' THEN 2
                WHEN exam LIKE 'MID%' THEN 3
                WHEN exam LIKE 'Final%' THEN 4
                WHEN exam LIKE 'Assignment%' THEN 5
                WHEN exam LIKE 'Presentation%' THEN 6
                WHEN exam LIKE 'Project%' THEN 7
                WHEN exam LIKE 'VIVA%' THEN 8
            END";
    $r1=mysqli_query($con,$q1);
    /*while($row1=mysqli_fetch_assoc($r1)){
        $q2="SELECT * from exam_co where section='$section' and exam='$row1[exam]'";
        $r2=mysqli_query($con,$q2);
        $row2=mysqli_fetch_assoc($r2);
        $convert=percent($row2['mark'],$row1['wt']);
        $q3="INSERT into co_con values('$section','$a','$row1[exam]',$convert)";
        $r2=mysqli_query($con,$q3);
    }*/
}
header("location:co_sheet.php");
?>