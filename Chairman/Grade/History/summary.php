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
$initial=$_SESSION['view'];
$section=$_SESSION['tsection'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['tsem'];

$co="SELECT co from exam_co where section='$section' and co!='NONE' group by co";
$rco=mysqli_query($con,$co);
$arr=array();
while($roo1=mysqli_fetch_assoc($rco)){
    $q2="SELECT * from exam_co where section='$section' and co='$roo1[co]'";
    $r2=mysqli_query($con,$q2);
    $ro1=mysqli_num_rows($r2);
    array_push($arr,$roo1['co']);
    echo "<th rowspan='50'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</th>";
}

$st_q="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
$st_r=mysqli_query($con,$st_q);
?>
<center><h2 class='lev'><?php echo $section ?> CO Assessment Summary </h2></center>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>Number of Students</th>
<th class='th1'><?php echo mysqli_num_rows($st_r) ?></th>
</tr>
</table>
<br><br>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>
</th>
<th class='th1' colspan='2'>
Mark range
</th>
</tr>
<tr class='tr1'>
<th class='th1'>
Performance Category
</th>
<th class='th1'>
Min
</th>
<th class='th1'>
Max
</th>
</tr>
<tr class='tr1'>
<td class='td1'>
Examplary
</td>
<td class='td1'>
80
</td>
<td class='td1'>
100
</td>
</tr>
<tr class='tr1'>
<td class='td1'>
Satisfactory
</td>
<td class='td1'>
60
</td>
<td class='td1'>
79.99
</td>
</tr>
<tr class='tr1'>
<td class='td1'>
Developing
</td>
<td class='td1'>
40
</td>
<td class='td1'>
59.99
</td>
</tr>
<tr class='tr1'>
<td class='td1'>
Unsatisfactory
</td>
<td class='td1'>
0
</td>
<td class='td1'>
39.99
</td>
</tr>
</table>
<center>
<h3 class='lev'>Number of Students in each performance category</h3>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>
</th>
<th class='th1' colspan='4'>
Number of Student in each Performance Category
</th>
</tr>
<tr class='tr1'>
<th class='th1'>
Course Outcome
</th>
<th class='th1'>
Examplary 
</th>
<th class='th1'>
Satisfacotry 
</th>
<th class='th1'>
Developing 
</th>
<th class='th1'>
Unsatisfactory 
</th>
</tr>
<?php
foreach($arr as $a){
    $q1="SELECT * from co_full_marks where section='$section' and co='$a'";
    $r1=mysqli_query($con,$q1);
    $example=0;
    $satisfy=0;
    $devlop=0;
    $unsatisfy=0;
    while($row1=mysqli_fetch_assoc($r1)){
        $mark=converter($row1["tot"],100,$row1["mark"]);
        $check=category($mark);
        if($check=="Examplary"){
            $example++;
        }
        else if($check=="Satisfactory"){
            $satisfy++;
        }
        else if($check=="Developing"){
            $devlop++;
        }
        else if($check=="Unsatisfactory"){
            $unsatisfy++;
        }
    }
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$a."</td>";
    echo "<td class='td1'>".$example."</td>";
    echo "<td class='td1'>".$satisfy."</td>";
    echo "<td class='td1'>".$devlop."</td>";
    echo "<td class='td1'>".$unsatisfy."</td>";
    echo "</tr>";
}
$q2="SELECT id,sum(CAST(mark as decimal(5,2))) as ovarall FROM `co_full_marks` where section='$section' GROUP by id";
$r2=mysqli_query($con,$q2);
$example=0;
$satisfy=0;
$devlop=0;
$unsatisfy=0;
while($row2=mysqli_fetch_assoc($r2)){
    $check=category($row2['ovarall']);
        if($check=="Examplary"){
            $example++;
        }
        else if($check=="Satisfactory"){
            $satisfy++;
        }
        else if($check=="Developing"){
            $devlop++;
        }
        else if($check=="Unsatisfactory"){
            $unsatisfy++;
        }
}
echo "<tr class='tr1'>";
echo "<td class='td1'>Ovarall CO</td>";
echo "<td class='td1'>".$example."</td>";
echo "<td class='td1'>".$satisfy."</td>";
echo "<td class='td1'>".$devlop."</td>";
echo "<td class='td1'>".$unsatisfy."</td>";
echo "</tr>";
?>
</table>


<br>



<h3 class='lev'>% of Students in each performance category</h3>
<table class='tab1'>
<tr class='tr1'>
<th class='th1'>
</th>
<th class='th1' colspan='4'>
Percentage of Students in each Performance Category
</th>
</tr>
<tr class='tr1'>
<th class='th1'>
Course Outcome
</th>
<th class='th1'>
Examplary 
</th>
<th class='th1'>
Satisfacotry 
</th>
<th class='th1'>
Developing 
</th>
<th class='th1'>
Unsatisfactory 
</th>
</tr>
<?php
foreach($arr as $a){
    $q1="SELECT * from co_full_marks where section='$section' and co='$a'";
    $r1=mysqli_query($con,$q1);
    $example=0;
    $satisfy=0;
    $devlop=0;
    $unsatisfy=0;
    while($row1=mysqli_fetch_assoc($r1)){
        $mark=converter($row1["tot"],100,$row1["mark"]);
        $check=category($mark);
        if($check=="Examplary"){
            $example++;
        }
        else if($check=="Satisfactory"){
            $satisfy++;
        }
        else if($check=="Developing"){
            $devlop++;
        }
        else if($check=="Unsatisfactory"){
            $unsatisfy++;
        }
    }
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$a."</td>";
    echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$example)."%</td>";
    echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$satisfy)."%</td>";
    echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$devlop)."%</td>";
    echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$unsatisfy)."%</td>";
    echo "</tr>";
}
$q2="SELECT id,sum(CAST(mark as decimal(5,2))) as ovarall FROM `co_full_marks` where section='$section' GROUP by id";
$r2=mysqli_query($con,$q2);
$example=0;
$satisfy=0;
$devlop=0;
$unsatisfy=0;
while($row2=mysqli_fetch_assoc($r2)){
    $check=category($row2['ovarall']);
        if($check=="Examplary"){
            $example++;
        }
        else if($check=="Satisfactory"){
            $satisfy++;
        }
        else if($check=="Developing"){
            $devlop++;
        }
        else if($check=="Unsatisfactory"){
            $unsatisfy++;
        }
}
echo "<tr class='tr1'>";
echo "<td class='td1'>Ovarall CO</td>";
echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$example)."%</td>";
echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$satisfy)."%</td>";
echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$devlop)."%</td>";
echo "<td class='td1'>".converter(mysqli_num_rows($st_r),100,$unsatisfy)."%</td>";
echo "</tr>";
?>
</table>
<br>
<br>
<?php
$po="SELECT PO from co_id where code='$code' group by po ASC";
$rpo=mysqli_query($con,$po);
$arr_po=array();
while($roo1=mysqli_fetch_assoc($rpo)){
    array_push($arr_po,$roo1['PO']);
}
?>
    <h2 class='lev'>PO Mark Sheet</h2>
    <table class='tab1'>
        <tr class='tr1'>
            <th class='th1' rowspan='2'>Student ID</th>
            <th class='th1' colspan='<?php echo count($arr_po)."(100%)" ?>'>PO</th>
            <th class='th1' rowspan='2'>Total(100%)</th>
        </tr>
        <tr class='tr1'>
            <?php
            foreach($arr_po as $po){
                echo "<th class='th1'>".$po."</th>";
            }
            ?>
        </tr>
        <?php
        $sql="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row['st_id']."</td>";
            foreach($arr_po as $po){
                $q1="SELECT * from po where section='$section' and id=$row[st_id]  and po='$po'";
                $r1=mysqli_query($con,$q1);
                $row1=mysqli_fetch_assoc($r1);
                echo "<td class='td1'>".$row1['mark']."%</td>";
            }
            $q2="SELECT AVG(mark) as total FROM `po` WHERE section='$section' and id=$row[st_id]";
            $r2=mysqli_query($con,$q2);
            $row2=mysqli_fetch_assoc($r2);
            echo "<td class='td1'>".number_format((float)$row2['total'], 2, '.', '')."%</td>";
            echo "</tr>";
        }
        ?>
        </table>
<br>
<br>
<button name='back' class='aback'><a class='lab' href='review.php'>Back</a></button>&nbsp&nbsp&nbsp&nbsp<button name='back' class='aback'><a class='lab' href='assessment.php'>Next</a></button>
</center>
</body>
</html>