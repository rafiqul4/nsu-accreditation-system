<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<SCRIPT type="text/javascript">
window.history.forward();
</script>
</head>
<body>
<center>
</br>
    <?php
    require_once("../../connection.php");
    session_start();
    $initial=$_SESSION['user'];
    $section=$_SESSION['section'];

    $code=$_SESSION['fcode'];
    $sec=$_SESSION['fsec'];
    $sem=$_SESSION['sem'];

    $tot_ct=$_SESSION['tct'];
    $tot_quiz=$_SESSION['tquiz'];
    $tot_mid=$_SESSION['tmid'];
    $tot_final=$_SESSION['tfinal'];
    $tot_assignment=$_SESSION['tassingemnt'];
    $tot_present=$_SESSION['tpresent'];
    $tot_pro=$_SESSION['tpro'];
    $tot_viva=$_SESSION['tviva'];

    $best_ct=$_SESSION['bct'];
    $best_quiz=$_SESSION['bq'];
    $best_mid=$_SESSION['bmid'];
    $best_final=$_SESSION['bfinal'];
    $best_assignment=$_SESSION['bass'];
    $best_present=$_SESSION['bpresent'];
    $best_pro=$_SESSION['bpro'];
    $best_viva=$_SESSION['bviva'];

    $p_ct=$_SESSION['pct'];
    $p_quiz=$_SESSION['pquiz'];
    $p_mid=$_SESSION['pmid'];
    $p_final=$_SESSION['pfinal'];
    $p_assignment=$_SESSION['passingemnt'];
    $p_present=$_SESSION['ppresent'];
    $p_pro=$_SESSION['ppro'];
    $p_viva=$_SESSION['pviva'];

    $attendence=$_SESSION['attendence'];
    $lab=$_SESSION['lab'];
    $curve=$_SESSION['curve'];
    $ceil=$_SESSION['ceil'];

    $query="SELECT * FROM exam_co where section='$section'";
    $result=mysqli_query($con,$query);
    $exam=mysqli_num_rows($result);

    if($lab==0){
        $assesment=$exam+4;
    }
    else{
        $assesment=$exam+5;
    }

    if($curve=='bonus'){
        $assesment=$assesment+1;
    }
    

    $sql="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem' ";
    $res=mysqli_query($con,$sql);
    $tot_student=mysqli_num_rows($res);

    if($tot_student>0){
        ?>
        <h2 class='lev'><b><u>Grade Sheet</u></b></h2>
        <h2 class='lev'><b><?php echo $section ?></b></h2>
        <form method='POST'>
        <table class='tab1'>
        <tfoot class='tfo'><tr class='tr1'><td class='td1' colspan='<?php echo $assesment ?>'><button name='done' class='sobuj'>Save</button>&nbsp&nbsp&nbsp&nbsp<button class='set'><a class='lab' href='result.php'>Check Grade</a></button></th></tr>
        <tr class='tr1'><th class='th1' colspan='<?php echo $assesment ?>'><button class='set'><a class='lab' href='../../excel_mark.php' target="_blank">Download</a></button><th></tr><tfoot>
        <tr class='tr1'>
        <th class='th1' rowspan='3'><h6>Student Serial</h6></th>
        <th class='th1' rowspan='3'><h6>Student ID</h6></th>
        <th class='th1' rowspan='3'><h6>Student Name</h6></th>
        <th class='th1' rowspan='3'><h6>Attendence(<?php echo $attendence ?>%)</h6></th>
        <?php
        if($tot_ct>0){
            echo "<th class='th1' colspan='$tot_ct'><h6>CT(".$p_ct."%)</h6></th>";
        }
        if($tot_quiz>0){
            echo "<th class='th1' colspan='$tot_quiz'><h6>Quiz(".$p_quiz."%)</h6></th>";
        }
        if($tot_mid>0){
            echo "<th class='th1' colspan='$tot_mid'><h6>MID(".$p_mid."%)</h6></th>";
        }
        if($tot_final>0){
            echo "<th class='th1' colspan='$tot_final'><h6>Final(".$p_final."%)</h6></th>";
        }
        if($tot_assignment>0){
            echo "<th class='th1' colspan='$tot_assignment'><h6>Assignment(".$p_assignment."%)</h6></th>";
        }
        if($tot_present>0){
            echo "<th class='th1' colspan='$tot_present'><h6>Presentation(".$p_present."%)</h6></th>";
        }
        if($tot_pro>0){
            echo "<th class='th1' colspan='$tot_pro'><h6>Project(".$p_pro."%)</h6></th>";
        }
        if($tot_viva>0){
            echo "<th class='th1' colspan='$tot_viva'><h6>VIVA(".$p_viva."%)</h6></th>";
        }
        if($lab>0){
            echo "<th class='th1' rowspan='3'><h6>Lab(".$lab."%)</h6></th>";
        }
        if($curve=='bonus'){
            echo "<th class='th1' rowspan='3'><h6>Bonus Mark</h6></th>";
        }
        echo "</tr>";


        echo "<tr class='tr1'>";
        for($a=1;$a<=$tot_ct;$a++){
            echo "<th class='th1'><h6>CT".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_quiz;$a++){
            echo "<th class='th1'><h6>Q".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_mid;$a++){
            echo "<th class='th1'><h6>MID".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_final;$a++){
            echo "<th class='th1'><h6>Final".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_assignment;$a++){
            echo "<th class='th1'><h6>Assignment".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_present;$a++){
            echo "<th class='th1'><h6>Presentation".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_pro;$a++){
            echo "<th class='th1'><h6>Project".$a."</h6></th>";
        }
        for($a=1;$a<=$tot_viva;$a++){
            echo "<th class='th1'><h6>VIVA".$a."</h6></th>";
        }
        echo "</tr>";

        echo "<tr class='tr1'>";
        for($a=1;$a<=$tot_ct;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='CT$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['marks']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_quiz;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Q$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_mid;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='MID$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_final;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Final$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_assignment;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Assignment$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_present;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Presentation$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_pro;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Project$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        for($a=1;$a<=$tot_viva;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='VIVA$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                echo "<th class='th1'><h6>".$row1['mark']."</h6></th>";
            }
        }
        echo "</tr>";
        
        $i=1;
        while($row2=mysqli_fetch_assoc($res)){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row2['sl']."</td>";
            echo "<td class='td1'>".$row2['st_id']."</td>";
            echo "<td class='td1'>".$row2['st_name']."</td>";

            $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Attendance'";
            $r3=mysqli_query($con,$q3);
            $row4=mysqli_fetch_assoc($r3);
            echo "<td class='td1'><input type='number' step='any' min='0' max='$attendence' name='att$i' value='$row4[mark]' class='di' required/></td>";

            for($j=1;$j<=$tot_ct;$j++){
                $q2="SELECT * from exam_co where section='$section' and exam='CT$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='CT$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' min='0' step='any' max='$row[mark]' name='CT$i$j' value='$row4[mark]' class='di' required/></td>";
                }   
            }
            for($j=1;$j<=$tot_quiz;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='Q$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Q$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' min='0' max='$row[mark]' step='any' name='Q$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_mid;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='MID$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='MID$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' min='0' max='$row[mark]' step='any' name='M$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_final;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='Final$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Final$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' min='0' max='$row[mark]' step='any' name='F$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_assignment;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='Assignment$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Assignment$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' step='any' min='0' max='$row[mark]' name='A$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_present;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='Presentation$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Presentation$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' min='0' step='any' max='$row[marks]' name='P$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_pro;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='Project$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='Project$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' step='any' min='0' max='$row[mark]' name='Pro$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }
            for($j=1;$j<=$tot_viva;$j++){
                $q2="SELECT * from exam_co  where section='$section' and exam='VIVA$j'";
                $r2=mysqli_query($con,$q2);
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='VIVA$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                while($row=mysqli_fetch_assoc($r2)){
                    echo "<td class='td1'><input type='number' step='any' min='0' max='$row[mark]' name='V$i$j' value='$row4[mark]' class='di' required/></td>";
                }
            }

            if($lab>0){
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='LAB'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                echo "<td class='td1'><input type='number' step='any' min='0' max='$lab' name='lab$i' value='$row4[mark]' class='di' required/></td>";
            }

            if($curve=='bonus'){
                $q3="SELECT * from marks where section='$section' and id='$row2[st_id]' and exam='bonus'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                echo "<td class='td1'><input type='number' step='any' min='0' max='100' name='bon$i' value='$row4[mark]' class='di' required/></td>";
            }

            echo "</tr>";
            $i++;
        }
        ?>
        </form>
        <?php
    }
    else{
        echo "<h3 class='lev'>No Students Has been enrolled in the section</h3>";
    }
            
    ?>
    </table>
    </br><button class='aback'><a class='lab' href='section_list.php'>Back</a></button>
</center>
<?php
if(isset($_POST['done'])){
    $fsql="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem' ";
    $fres=mysqli_query($con,$sql);
    $i=1;
    while($row3=mysqli_fetch_assoc($fres)){
        
        $rq="UPDATE marks set mark='".$_POST["att$i"]."' where section='$section' and id=$row3[st_id] and exam='Attendance'";
        $rr=mysqli_query($con,$rq);
 
        for($j=1;$j<=$tot_ct;$j++){
            $rq="UPDATE marks set mark='".$_POST["CT$i$j"]."' where section='$section' and id=$row3[st_id] and exam='CT$j'";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_quiz;$j++){
            $rq="UPDATE marks set mark='".$_POST["Q$i$j"]."' where section='$section' and id=$row3[st_id] and exam='Q$j'";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_mid;$j++){
            $rq="UPDATE marks set mark='".$_POST["M$i$j"]."' where section='$section' and id=$row3[st_id] and exam='MID$j'";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_final;$j++){
            $rq="UPDATE marks set mark='".$_POST["F$i$j"]."' where section='$section' and id=$row3[st_id] and exam='Final$j'";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_assignment;$j++){
            $rq="UPDATE marks set mark='".$_POST["A$i$j"]."' where section='$section' and id=$row3[st_id] and exam='Assignment$j'";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_present;$j++){
            $rq="UPDATE marks set mark='".$_POST["P$i$j"]."' where section='$section' and id=$row3[st_id] and exam='Presentation$j'";
            $rr=mysqli_query($con,$rq);
        }
        

        for($j=1;$j<=$tot_pro;$j++){
            $rq="UPDATE marks set mark='".$_POST["Pro$i$j"]."' where section='$section' and id=$row3[st_id] and exam='Project$j'";
            $rr=mysqli_query($con,$rq);
        }

        for($j=1;$j<=$tot_viva;$j++){
            $rq="UPDATE marks set mark='".$_POST["V$i$j"]."' where section='$section' and id=$row3[st_id] and exam='VIVA$j'";
            $rr=mysqli_query($con,$rq); 
        }
        
        if($lab>0){
            $rq="UPDATE marks set mark='".$_POST["lab$i"]."' where section='$section' and id=$row3[st_id] and exam='LAB'";
            $rr=mysqli_query($con,$rq);
        }

        if($curve=='bonus'){
            $rq="UPDATE marks set mark='".$_POST["bon$i"]."' where section='$section' and id=$row3[st_id] and exam='bonus'";
            $rr=mysqli_query($con,$rq);
        }
    echo "</br>";
    
    $i++;
    }
    echo "<script>window.location.href='update_sheet.php'</script>";
}
?>
</body>
</html>