<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<center>
<?php
require_once("../../connection.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];

$sql="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem' ";
$res=mysqli_query($con,$sql);
$tot_student=mysqli_num_rows($res);
?>
<h2 class='lev'>Review Grade Sheet of <?php echo $section?></h2>
<table class='tab1'>
<tfoot class='tfo'><tr class='tr1'><td class='td1' colspan='100'><button name='done' class='set'><a class='lab' href='./CO/process.php'>CO Grade sheet</a></button></th></tr><tfoot>
<tr class='tr1'>
    <th class='th1' rowspan='3'><h6>Student Serial</h6></th>
    <th class='th1' rowspan='3'><h6>Student ID</h6></th>
    <th class='th1' rowspan='3'><h6>Student Name</h6></th>
    <?php 
    $query="SELECT * from exam_detail where section='$section' and exam='Attendence'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    ?>
    <th class='th1' rowspan='3'><h6>Attendence(<?php echo $row['percentage'] ?>%)</h6></th>
    <?php
    $query="SELECT * from exam_detail where section='$section' and exam='CT'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>CT<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>CT($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='Quiz'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>Quiz<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Quiz($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='MID'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>MID<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>MID($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='Final'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>FInal<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Final($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='Assignment'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>Assignment<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Assignment($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='Presentation'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>Presentation<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Presentation($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='Project'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>Project<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Project($row[percentage]%)</h6></th>";
    }   

    $query="SELECT * from exam_detail where section='$section' and exam='VIVA'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' colspan='$row[total]'><h6>VIVA<br>(Best $row[best])</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>VIVA($row[percentage]%)</h6></th>";
    }

    $query="SELECT * from exam_detail where section='$section' and exam='LAB' and percentage!=0";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<th class='th1' rowspan='3'><h6>LAB<br>($row[percentage])</h6></th>";
    }

    echo "<th class='th1' rowspan='3'><h6>Total Mark</h6></th>";
    $cur="SELECT * from full_marks where section='$section'";
    $mc=mysqli_query($con,$cur);
    $ros=mysqli_fetch_assoc($mc);
    if($ros['method']!=NULL){
        echo "<th class='th1' rowspan='3'><h6>Curving</h6></th>";
        echo "<th class='th1' rowspan='3'><h6>Final Mark</h6></th>";
    }
    echo "<th class='th1' rowspan='3'><h6>Grade</h6></th>";
    ?>
</tr>
<tr class='tr1'>
    <?php
    $q2="SELECT * from exam_co where section='$section' and exam like 'CT%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'Q%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'MID%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'Final%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'Assignment%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'Presentation%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'Project%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }

    $q2="SELECT * from exam_co where section='$section' and exam like 'VIVA%' ";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        while($row1=mysqli_fetch_assoc($r2)){
            echo "<td class='td'><h6><center>".$row1['exam']."</center></h6></td>";
        }
    }
    ?>
</tr>
<tr class='tr1'>
<?php
     $q2="SELECT * from exam_co where section='$section' and exam like 'CT%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['marks']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'Q%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'MID%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'Final%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'Assignment%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'Presentation%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'Project%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
 
     $q2="SELECT * from exam_co where section='$section' and exam like 'VIVA%' ";
     $r2=mysqli_query($con,$q2);
     if(mysqli_num_rows($r2)>0){
         while($row1=mysqli_fetch_assoc($r2)){
             echo "<td class='td'><h6><center>".$row1['mark']."</center></h6></td>";
         }
     }
?>
</tr>
<?php
while($row2=mysqli_fetch_assoc($res)){
    echo "<tr class='tr1'>";
    echo "<td class='td1'>".$row2['sl']."</td>";
    echo "<td class='td1'>".$row2['st_id']."</td>";
    echo "<td class='td1'>".$row2['st_name']."</td>";

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Attendance'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
        }
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'CT%' and exam!='CT'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='CT'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Q%' and exam!='Quiz'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Quiz'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'MID%' and exam!='MID'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='MID'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Final%' and exam!='Final'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Final'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Assignment%' and exam!='Assignment'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Assignment'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Presentation%' and exam!='Presentation'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Presentation'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Project%' and exam!='Project'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Project'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'VIVA%' and exam!='VIVA'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'>".$rowm['mark']."</td>";
        }
        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='VIVA'";
        $mr=mysqli_query($con,$mq);
        $rowm=mysqli_fetch_assoc($mr);
        echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
    }

    $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='LAB'";
    $mr=mysqli_query($con,$mq);
    if(mysqli_num_rows($mr)>0){
        while($rowm=mysqli_fetch_assoc($mr)){
            echo "<td class='td1'><b>".$rowm['mark']."</b></td>";
        }
    }

    $cur="SELECT * from full_marks where section='$section' and id=$row2[st_id] ";
    $mc=mysqli_query($con,$cur);
    if(mysqli_num_rows($mc)>0){
        while($rowm=mysqli_fetch_assoc($mc)){
            if(empty($rowm['method'])){
                echo "<td class='td1'><b>".$rowm['i_mark']."</b></td>";
                echo "<td class='td1'><b>".$rowm['grade']."</b></td>";
            }
            else{
                echo "<td class='td1'><b>".$rowm['i_mark']."</b></td>";
                echo "<td class='td1'><b>".$rowm['method']."</b></td>";
                echo "<td class='td1'><b>".$rowm['c_mark']."</b></td>";
                echo "<td class='td1'><b>".$rowm['grade']."</b></td>";
            }
        }
    }

    echo "</tr>";
}
?>
</table>
<br>
<button class='aback'><a class='lab' href='remove.php'>Back</a></button>
</body>
</html>