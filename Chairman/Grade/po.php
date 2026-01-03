<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<?php
require_once("../../connection.php");
require_once("../../algorithm.php");
session_start();
$initial=$_SESSION['view'];
$section=$_SESSION['tsection'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['fsem'];

$po="SELECT PO from co_id where code='$code' group by po ASC";
$rpo=mysqli_query($con,$po);
$arr_po=array();
while($roo1=mysqli_fetch_assoc($rpo)){
    array_push($arr_po,$roo1['PO']);
}
?>
<center>
    <h2 class='lev'>PO Mark Sheet of <?php echo $section ?></h2>
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
    <button class='aback' name='no'><a class='lab' href='summary.php'>Back</button>&nbsp&nbsp&nbsp&nbsp<button class='aback'><a class='lab' href='assessment.php'>Next</a></button>
</center>
<?php
?>
</body>
</html>