<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../../Images/mini.png'>
<link rel="stylesheet" href="../../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<SCRIPT type="text/javascript">
window.history.forward();
</script>
</head>
<body>
<center>
<?php
require_once("../../../connection.php");
require_once("../../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];

$q1="SELECT co from exam_co where section='$section' and co!='NONE' group by co";
$r1=mysqli_query($con,$q1);
?>
<h2 class='lev'><?php echo "CO Assessment Sheet of ".$section ?></h2>
<form method='POST'>
<table class='tab1'>
<tfoot class='tfo'><tr class='tr1'><td class='td1' colspan='100'><button name='done' class='set'>Submit</button></th></tr><tfoot>
<tr class='tr1'>
<h6><th class='th1' rowspan='2'>Student ID</h6></th>
<?php
$arr=array();
while($row1=mysqli_fetch_assoc($r1)){
    $q2="SELECT * from exam_co where section='$section' and co='$row1[co]'";
    $r2=mysqli_query($con,$q2);
    $ro1=mysqli_num_rows($r2);
    echo "<h6><th class='th1' colspan='$ro1'>".$row1['co']."</h6></th>";
    array_push($arr,$row1['co']);
    echo "<th rowspan='50'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</th>";
}
?>
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
        echo "<th class='th1'>".$row1['exam']."</th>";
    }
}
?>
</tr>
<tr class='tr1'>
<th class='th1'>Assessed in--></td>
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
        echo "<th class='th1'>".$row1['mark']."</td>";
    }
}
?>
</tr>
    <?php
    $st="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
    $rt=mysqli_query($con,$st);
    $arr2=array();
    $arr2[]=array();
    $arr2[]=array();
    $arr2[1][] = array();
    $arr2 = [];
    $arr2[] = [];
    $arr2[] = [];
    $arr2[1][] = [];
    $i=1;
    while($row=mysqli_fetch_assoc($rt)){
        echo "<tr class='tr1'>";
        echo "<td class='td1'>".$row['st_id']."</td>";
        $j=1;
        foreach($arr as $a){
            $q1="SELECT * FROM `exam_co` where section='$section' and co='$a'
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
            $k=1;
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<td class='td1'><input type='number' step='any' class='di' min='0' max='$row1[mark]' name='arr3$i$j$k' value='0' required/></td>";
                $arr2[$i][$j][$k]="$row1[exam]";
                $k++;
            }
            $j++;
        }
        $i++;
        echo "</tr>";
    }
    ?>
</table>
</form><br>
<button name='back' class='aback'><a class='lab' href='../grade.php'>Cancel</a></button>
</center>
</body>
<script>
    function sure(){
        return confirm("If you click cancel you grade sheet record will be removed.\n\n Are you sure you want to cancel?")
    }
</script>
<?php
if(isset($_POST['done'])){
    $st="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
    $rt=mysqli_query($con,$st);
    $i=1;
    while($final=mysqli_fetch_assoc($rt)){
        $j=1;
            foreach($arr as $a){
                $q1="SELECT * FROM `exam_co` where section='$section' and co='$a'
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
                $k=1;
                while($row1=mysqli_fetch_assoc($r1)){
                    $string=$arr2[$i][$j][$k];
                    $query="INSERT into co_marks values('$section',$final[st_id],'$a','$string','".$_POST["arr3$i$j$k"]."')";
                    $result=mysqli_query($con,$query);
                    $k++;
                }
                $j++;
            }
            $i++;
    }
    $st="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
    $rt=mysqli_query($con,$st);
    while($final=mysqli_fetch_assoc($rt)){
        foreach($arr as $a){
            $cm="SELECT section,co,sum(mark) as mark FROM exam_co WHERE section='$section' and co='$a'";
            $rc=mysqli_query($con,$cm);
            $fm="SELECT section,id,co,sum(CAST(wt as decimal(5,2))) as mark FROM co_marks WHERE id=$final[st_id] and section='$section' and co='$a'";
            $rm=mysqli_query($con,$fm);
            $co="SELECT * from co_id where code='$code' and title='$a'";
            $ro=mysqli_query($con,$co);
            $tot_co=mysqli_fetch_assoc($rc);
            $full=mysqli_fetch_assoc($rm);
            $convert=mysqli_fetch_assoc($ro);
            $percent=converter($tot_co['mark'],100,$full['mark']);
            $insert=converter($tot_co['mark'],$convert['wt'],$full['mark']);
            $full_query="INSERT into co_full_marks values('$section',$final[st_id],'$a',$convert[wt],$insert)";
            $res_full=mysqli_query($con,$full_query);
        }
    }
    echo "<script>window.location.href='review.php'</script>";
}
?>
</html>