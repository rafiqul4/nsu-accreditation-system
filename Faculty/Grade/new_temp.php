<?php
require_once("../../connection.php");
session_start();
$code=$_GET['co'];
$_SESSION['fcode']=$_GET['co'];
$sec=$_GET['sec'];
$_SESSION['fsec']=$_GET['sec'];
$sem=$_GET['se'];
$str=$code.".".$sec.$sem;
$section=str_replace(' .','.',$str);
$_SESSION["section"]=$section;
$q1="SELECT * from exam_detail where section='$section' and exam='CT'";
$r1=mysqli_query($con,$q1);
if(mysqli_num_rows($r1)>0){
    $row1=mysqli_fetch_assoc($r1);
    $_SESSION['tct']=$row1['total'];
    $_SESSION['bct']=$row1['best'];
    $_SESSION['pct']=$row1['percentage'];
}
else{
    $_SESSION['tct']=0;
    $_SESSION['bct']=0;
    $_SESSION['pct']=0;
}

$q2="SELECT * from exam_detail where section='$section' and exam='Quiz'";
$r2=mysqli_query($con,$q2);
if(mysqli_num_rows($r2)>0){
    $row2=mysqli_fetch_assoc($r2);
    $_SESSION['tquiz']=$row2['total'];
    $_SESSION['bq']=$row2['best'];
    $_SESSION['pquiz']=$row2['percentage'];
}
else{
    $_SESSION['tquiz']=0;
    $_SESSION['bq']=0;
    $_SESSION['pquiz']=0;
}

$q3="SELECT * from exam_detail where section='$section' and exam='MID'";
$r3=mysqli_query($con,$q3);
if(mysqli_num_rows($r3)>0){
    $row3=mysqli_fetch_assoc($r3);
    $_SESSION['tmid']=$row3['total'];
    $_SESSION['bmid']=$row3['best'];
    $_SESSION['pmid']=$row3['percentage'];
}
else{
    $_SESSION['tmid']=0;
    $_SESSION['bmid']=0;
    $_SESSION['pmid']=0;
}

$q4="SELECT * from exam_detail where section='$section' and exam='Final'";
$r4=mysqli_query($con,$q4);
if(mysqli_num_rows($r4)>0){
    $row4=mysqli_fetch_assoc($r4);
    $_SESSION['tfinal']=$row4['total'];
    $_SESSION['bfinal']=$row4['best'];
    $_SESSION['pfinal']=$row4['percentage'];
}
else{
    $_SESSION['tfinal']=0;
    $_SESSION['bfinal']=0;
    $_SESSION['pfinal']=0;
}

$q5="SELECT * from exam_detail where section='$section' and exam='Assignment'";
$r5=mysqli_query($con,$q5);
if(mysqli_num_rows($r5)>0){
    $row5=mysqli_fetch_assoc($r5);
    $_SESSION['tassingemnt']=$row5['total'];
    $_SESSION['bass']=$row5['best'];
    $_SESSION['passingemnt']=$row5['percentage'];
}
else{
    $_SESSION['tassingemnt']=0;
    $_SESSION['bass']=0;
    $_SESSION['passingemnt']=0;
}

$q6="SELECT * from exam_detail where section='$section' and exam='Presentation'";
$r6=mysqli_query($con,$q6);
if(mysqli_num_rows($r6)>0){
    $row6=mysqli_fetch_assoc($r6);
    $_SESSION['tpresent']=$row6['total'];
    $_SESSION['bpresent']=$row6['best'];
    $_SESSION['ppresent']=$row6['percentage'];
}
else{
    $_SESSION['tpresent']=0;
    $_SESSION['bpresent']=0;
    $_SESSION['ppresent']=0;
}

$q7="SELECT * from exam_detail where section='$section' and exam='Project'";
$r7=mysqli_query($con,$q7);
if(mysqli_num_rows($r7)>0){
    $row7=mysqli_fetch_assoc($r7);
    $_SESSION['tpro']=$row7['total'];
    $_SESSION['bpro']=$row7['best'];
    $_SESSION['ppro']=$row7['percentage'];
}
else{
    $_SESSION['tpro']=0;
    $_SESSION['bpro']=0;
    $_SESSION['ppro']=0;
}

$q8="SELECT * from exam_detail where section='$section' and exam='VIVA'";
$r8=mysqli_query($con,$q8);
if(mysqli_num_rows($r8)>0){
    $row8=mysqli_fetch_assoc($r8);
    $_SESSION['tviva']=$row8['total'];
    $_SESSION['bviva']=$row8['best'];
    $_SESSION['pviva']=$row8['percentage'];
}
else{
    $_SESSION['tviva']=0;
    $_SESSION['bviva']=0;
    $_SESSION['pviva']=0;
}

$q9="SELECT * from exam_detail where section='$section' and exam='Attendence'";
$r9=mysqli_query($con,$q9);
$row9=mysqli_fetch_assoc($r9);
$_SESSION['attendence']=$row9['percentage'];

$q10="SELECT * from exam_detail where section='$section' and exam='LAB'";
$r10=mysqli_query($con,$q10);
$row10=mysqli_fetch_assoc($r10);
$_SESSION['lab']=$row10['percentage'];

$q11="SELECT * from curve where section='$section'";
$r11=mysqli_query($con,$q11);
$row11=mysqli_fetch_assoc($r11);
$_SESSION['curve']=$row11['method'];
$_SESSION['ceil']=$row11['ceil'];

header("location:remove.php");
?>