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
    $section=$_GET['s'];
    $code=$_GET['c'];
    $q1="SELECT * from questions where section='$section'";
    $r1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_assoc($r1);
?>
</br>
<h3 class='lev'><?php echo $section ?></h3>
</br>
<table class='tab1'>
<tfoot class='tfo'>
    <tr class='tr1'>
        <th class='th1' colspan='3'>
            <div class='new'>
                <div class='new_box'>
                <a class='bin' href='<?php echo $row1['link']?>'  target='_blank'>Question Link</a>
                </div>
            </div>
        </th>
    </tr>
</tfoot>
<tr class='tr1'>
<th class='th1'>Assesments</th>
<th class='th1'>Marks</th>
<th class='th1'>Course Outcome</th>
</tr>
<?php

$q2="SELECT * from exam_co where section='$section'";
$r2=mysqli_query($con,$q2);
while($row2=mysqli_fetch_assoc($r2)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row2['exam']."</td>";
    echo "<td class='td1'>".$row2['mark']."</td>";
    echo "<td class='td1'>".$row2['co']."</td>";
    echo "</tr>";
}
?>
</table></br>
<button class='aback'><a class='lab' href='section_list.php'>Back</a></button>
</center>
<?php

?>    
</body>
</html>