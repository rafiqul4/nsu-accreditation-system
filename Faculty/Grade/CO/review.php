<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../../Images/mini.png'>
<link rel="stylesheet" href="../../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<?php
require_once("../../../connection.php");
require_once("../../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];
$code_name="SELECT * from course where code='$code'";
$code_result=mysqli_query($con,$code_name);
$code_fetch=mysqli_fetch_assoc($code_result);
$fac_name="SELECT * from faculty where initial='$initial'";
$fac_result=mysqli_query($con,$fac_name);
$fac_fetch=mysqli_fetch_assoc($fac_result);
?>
<center><h2 class='lev'>CO Assessment Report Review</h2></center><br>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>Coure Code and Name : </th>
<td class='td1'><?php echo $code. " ".$code_fetch['title'] ?></td>
</tr>
<tr class='tr1'>
<th class='th1'>Section : </th>
<td class='td1'><?php echo $sec ?></td>
</tr>
<tr class='tr1'>
<th class='th1'>Semester : </th>
<td class='td1'><?php echo $sem ?></td>
</tr>
<tr class='tr1'>
<th class='th1'>Faculty : </th>
<td class='td1'><?php echo $fac_fetch['name']." "."(".$initial.")"; ?></td>
</tr>
</table>
<br>
<br>
<center>
<?php 
$q1="SELECT co from exam_co where section='$section' and co!='NONE' group by co";
$r1=mysqli_query($con,$q1);
?>
<form method='POST'>
<table class='tab1'>
<tfoot class='tfo'><tr class='tr1'><td class='td1' colspan='100'><button name='done' class='set'><a class='lab' href='po_cal.php'>Next</a></button></th></tr><tfoot>
<tr class='tr1'>
<h6><th class='th1' rowspan='2'>CO</h6></th>
<?php
$arr=array();
while($row1=mysqli_fetch_assoc($r1)){
    $q2="SELECT * from exam_co where section='$section' and co='$row1[co]'";
    $r2=mysqli_query($con,$q2);
    $ro1=mysqli_num_rows($r2);
    $ro1=$ro1+3;
    echo "<th class='th1' colspan='$ro1'><h6>".$row1['co']."</h6></th>";
    array_push($arr,$row1['co']);
    echo "<th rowspan='50'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</th>";
}
?>
<th rowspan='3'><h6>Overall CO</h6></th>
</tr>
<tr class='tr1'>
<?php
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
    while($row1=mysqli_fetch_assoc($r1)){
        echo "<th class='th1'><h6>".$row1['exam']."</h6></th>";
    }
    echo "
    <th class='th1'><h6>total</h6></th>
    <th class='th1' rowspan='2'><h6>%</h6></th>
    <th class='th1'><h6>Weightage</h6></th>";
}
?>
</tr>
<tr class='tr1'>
<th class='th1'><h6>Assessed in--></h6></td>
<?php
foreach($arr as $a){
    $q1="SELECT * FROM exam_co where section='$section' and co='$a'
        ORDER BY co,
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
    while($row1=mysqli_fetch_assoc($r1)){
        echo "<th class='th1'><h6>".$row1['mark']."</h6></td>";
    }
    $tot_q="SELECT co,sum(CAST(mark as decimal(5,2))) as ovarall FROM `exam_co` where section='$section' and co='$a' GROUP by co";
    $res_q=mysqli_query($con,$tot_q);
    $row_q=mysqli_fetch_assoc($res_q);
    echo "<th class='th1'><h6>".$row_q['ovarall']."</h6></td>";
    $co_q="SELECT * from co_id where code='$code' and title='$a'";
    $res_co=mysqli_query($con,$co_q);
    $row_co=mysqli_fetch_assoc($res_co);
    echo "<th class='th1'><h6>".$row_co['wt']."</h6></td>";
}
?>
</tr>
<?php
$q1="SELECT id,sum(CAST(mark as decimal(5,2))) as ovarall FROM `co_full_marks` where section='$section' GROUP by id";
$r1=mysqli_query($con,$q1);
while($row1=mysqli_fetch_assoc($r1)){
    echo "<tr class='tr1'>";
    echo "<th class='th1'><h6>".$row1['id']."</h6></td>";
    foreach($arr as $a){
        $q2="SELECT * FROM co_marks where section='$section' and id=$row1[id] and co='$a'
                ORDER BY co,
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
        $r2=mysqli_query($con,$q2);
        $total=0;
        while($row2=mysqli_fetch_assoc($r2)){
            echo "<th class='th1'><h6>".$row2['wt']."</h6></td>";
            $num=$row2['wt'];
            $total=$total+$num;
        }
        $q3="SELECT section,co,sum(CAST(mark as decimal(5,2))) as ovarall FROM exam_co where section='$section' and co='$a'";
        $r3=mysqli_query($con,$q3);
        $row3=mysqli_fetch_assoc($r3);
        $full=$row3['ovarall'];
        echo "<th class='th1'><h6>".$total."</h6></td>";
        echo "<th class='th1'><h6>".converter($full,100,$total)."</h6></td>";
        $q4="SELECT * from co_full_marks where section='$section' and id=$row1[id] and co='$a'";
        $r4=mysqli_query($con,$q4);
        $row4=mysqli_fetch_assoc($r4);
        echo "<th class='th1'><h6>".$row4['mark']."</h6></td>";
    }
    echo "<th class='th1'><h6>".$row1['ovarall']."</h6></td>";
    echo "</tr>";
}
?>
</table>
</br>
<button name='back' class='aback' onclick="return sure()"><a class='lab' href='remove_co.php'>Cancel</a></button>
</center>
</body>
</html>