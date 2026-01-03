<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../../Images/mini.png'>
<link rel="stylesheet" href="../../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<SCRIPT type="text/javascript">

</script>
<body>
<?php
require_once("../../../connection.php");
require_once("../../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['tsection'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['tsem'];
$dep=$_SESSION['fdep'];

$code_name="SELECT * from course where code='$code'";
$code_result=mysqli_query($con,$code_name);
$code_fetch=mysqli_fetch_assoc($code_result);
$fac_name="SELECT * from faculty where initial='$initial'";
$fac_result=mysqli_query($con,$fac_name);
$fac_fetch=mysqli_fetch_assoc($fac_result);

$dep_name="SELECT * from department where dep='$dep'";
$dep_result=mysqli_query($con,$dep_name);
$dep_row=mysqli_fetch_assoc($dep_result);

$st_q="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
$st_r=mysqli_query($con,$st_q);

$co="SELECT co from exam_co where section='$section' and co!='NONE' group by co";
$rco=mysqli_query($con,$co);
$arr=array();
while($roo1=mysqli_fetch_assoc($rco)){
    $q2="SELECT * from exam_co where section='$section'  and co='$roo1[co]' ";
    $r2=mysqli_query($con,$q2);
    $ro1=mysqli_num_rows($r2);
    array_push($arr,$roo1['co']);
}
?>
<center>
    <table>
        <tr>
            <td><img src="../../../Images/mini.png" width="85" height="102"></td>
            <td>&nbsp</td>
            <td class='lev'><b>Assessment of Course Outcome Report</b><br>
                        <?php echo $dep_row['dep_name'];?><br>
                        School of Engineering and Physical Sciences<br>
                        North South UNiversity<br>
                        Bashundha, Dhaka, Bangladesh
            </td>
        </tr>
    </table>
    
    
</center><br><br>
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
<tr class='tr1'>
<th class='th1'>Number of Student Assessed : </th>
<td class='td1'><?php echo mysqli_num_rows($st_r); ?></td>
</tr>
</table>

<br><br>

<b class='lev'>Assessment Result:</b><br><br>
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
</table><br><br>
<?php
$q3="SELECT * from comment where section='$section'";
$r3=mysqli_query($con,$q3);
$row3=mysqli_fetch_assoc($r3);
?>
    <div>
        <label class='lev'><b>Observations :</b></label><br>
        <?php
        if(empty($row3['observe'])){
            ?>
            <textarea name='observe' class='report' readonly>Observations are not given by the faculty</textarea>
            <?php
        }
        else{
            ?>
            <textarea name='observe' class='report' readonly><?php echo $row3['observe'] ?></textarea>
            <?php
        }
        ?>
        
    </div><br>
    <div>
        <label class='lev'><b>Recommendations :</b></label><br>
        <?php
        if(empty($row3['recommend'])){
            ?>
            <textarea name='rec' class='report' readonly>Recommendations are not given by the faculty</textarea>
            <?php
        }
        else{
            ?>
            <textarea name='rec' class='report' readonly><?php echo $row3['recommend'] ?></textarea>
            <?php
        }
        ?>
    </div>
<br></br>

<center><button name='back' class='aback'><a class='lab' href='summary.php'>Back</a></button></center>
</body>
<script>
    function sure(){
        return confirm("If you didn't wrote any observations or Recommendations, your assessment will be submitted without any comment.")
    }
</script>
</html>