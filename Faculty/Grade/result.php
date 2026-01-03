<html>
<head>
<SCRIPT type="text/javascript">
window.history.forward();
</script>
</head>
<body>
<?php
require_once("../../connection.php");
require_once("../../algorithm.php");
session_start();
$initial=$_SESSION['user'];
$section=$_SESSION['section'];

$code=$_SESSION['fcode'];
$sec=$_SESSION['fsec'];
$sem=$_SESSION['sem'];

$attendence=$_SESSION['attendence'];
$lab=$_SESSION['lab'];
$curve=$_SESSION['curve'];
$ceil=$_SESSION['ceil'];

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

$query="SELECT * FROM questions where section='$section'";
$result=mysqli_query($con,$query);
$exam=mysqli_num_rows($result);

$sql="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem' ";
$res=mysqli_query($con,$sql);
$tot_student=mysqli_num_rows($res);

    if($tot_ct>0){
        $ct_i=array();
        for($a=1;$a<=$tot_ct;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='CT$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($ct_i,$row1['mark']);
            }
        }
    }

    if($tot_quiz>0){
    $quiz_i=array();
    for($a=1;$a<=$tot_quiz;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Q$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($quiz_i,$row1['mark']);
        }
    }
    }

    if($tot_mid>0){
        $mid_i=array();
        for($a=1;$a<=$tot_mid;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='MID$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($mid_i,$row1['mark']);
            }
        }
    }

    if($tot_final>0){
        $final_i=array();
        for($a=1;$a<=$tot_final;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Final$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($final_i,$row1['mark']);
            }
        }
    }

    if($tot_assignment>0){
        $as_i=array();
        for($a=1;$a<=$tot_assignment;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Assignment$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($as_i,$row1['mark']);
            }
        }
    }

    if($tot_present>0){
        $present_i=array();
        for($a=1;$a<=$tot_present;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Presentation$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($present_i,$row1['mark']);
            }
        }
    }

    if($tot_pro>0){
        $pro_i=array();
        for($a=1;$a<=$tot_pro;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='Project$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($pro_i,$row1['mark']);
            }
        }
    }

    if($tot_viva>0){
        $viva_i=array();
        for($a=1;$a<=$tot_viva;$a++){
            $q1="SELECT * from exam_co where section='$section' and exam='VIVA$a'";
            $r1=mysqli_query($con,$q1);
            while($row1=mysqli_fetch_assoc($r1)){
                array_push($viva_i,$row1['mark']);
            }
        }
    }


    while($row2=mysqli_fetch_assoc($res)){

        $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='Attendance'";
        $mr=mysqli_query($con,$mq);
        if(mysqli_num_rows($mr)>0){
            while($rowm=mysqli_fetch_assoc($mr)){
                $att=$rowm['mark'];
            }
        }

        if($tot_ct>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'CT%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $ct=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($ct,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($ct_i,$p_ct,$ct);
            $ct_mark=average($tot_ct,$best_ct,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'CT',$ct_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $ct_mark=0;
        }

        if($tot_quiz>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Q%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $quiz=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($quiz,$rowm['mark']);
                    
                }
            }

            ////////
            $convert=convertion($quiz_i,$p_quiz,$quiz);
            $quiz_mark=average($tot_quiz,$best_quiz,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'QUIZ',$quiz_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $quiz_mark=0;
        }


        if($tot_mid>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'M%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $mid=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($mid,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($mid_i,$p_mid,$mid);
            $mid_mark=average($tot_mid,$best_mid,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'MID',$mid_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $mid_mark=0;
        }


        if($tot_final>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Final%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $final=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($final,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($final_i,$p_final,$final);
            $final_mark=average($tot_final,$best_final,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'Final',$final_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $final_mark=0;
        }


        if($tot_assignment>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Assignment%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $assignment=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($assignment,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($as_i,$p_assignment,$assignment);
            $assignment_mark=average($tot_assignment,$best_assignment,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'Assignment',$assignment_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $assignment_mark=0;
        }


        if($tot_present>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Presentation%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $present=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($present,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($present_i,$p_present,$present);
            $present_mark=average($tot_present,$best_present,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'Presentation',$present_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $present_mark=0;
        }


        if($tot_pro>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'Project%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $pro=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($pro,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($pro_i,$p_pro,$pro);
            $pro_mark=average($tot_pro,$best_pro,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'Project',$pro_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $pro_mark=0;
        }


        if($tot_viva>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam like 'VIVA%'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                $viva=array();
                while($rowm=mysqli_fetch_assoc($mr)){
                    array_push($viva,$rowm['mark']);
                }
            }

            ////////
            $convert=convertion($viva_i,$p_viva,$viva);
            $viva_mark=average($tot_viva,$best_viva,$convert);
            $ex="INSERT into marks values('$section',$row2[st_id],'VIVA',$viva_mark)";
            $rx=mysqli_query($con,$ex);
            ////////
        }
        else{
            $viva_mark=0;
        }


        if($lab>0){
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='LAB'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                while($rowm=mysqli_fetch_assoc($mr)){
                    $la=$rowm['mark'];
                }
            }
        }
        else{
            $la=0;
        }
        
        $initial_full_mark=$att+$ct_mark+$quiz_mark+$mid_mark+$final_mark+$assignment_mark+$present_mark+$pro_mark+$viva_mark+$la;

        /////  curve ////////

        if($curve==0){
            if($ceil==1){
                $initial_full_mark=ceil($initial_full_mark);
                $grade=grade($initial_full_mark);
                $q2="INSERT into full_marks(section,id,i_mark,grade) values('$section',$row2[st_id],$initial_full_mark,'$grade')";
                $r2=mysqli_query($con,$q2);
            }
            else{
                $grade=grade($initial_full_mark);
                $q2="INSERT into full_marks(section,id,i_mark,grade) values('$section',$row2[st_id],$initial_full_mark,'$grade')";
                $r2=mysqli_query($con,$q2);
            }

        }

        else if($curve=='bonus'){
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            $mq="SELECT * from marks where section='$section' and id=$row2[st_id] and exam='bonus'";
            $mr=mysqli_query($con,$mq);
            if(mysqli_num_rows($mr)>0){
                while($rowm=mysqli_fetch_assoc($mr)){
                    $initial_full_mark=$initial_full_mark+$rowm['mark'];
                    if($initial_full_mark>100){
                        $initial_full_mark=100;
                    }
                    if($ceil==1){
                        $initial_full_mark=ceil($initial_full_mark);
                        $grade=grade($initial_full_mark);
                        $q3="UPDATE full_marks set method='+$rowm[mark]',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                    else{
                        $grade=grade($initial_full_mark);
                        $q3="UPDATE full_marks set method='+$rowm[mark]',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                }
            }
        }

        else if($curve=='inc'){
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            $grade=grade($initial_full_mark);
            $new_mark=$initial_full_mark+1;
            if($ceil==1){
                $new_mark=ceil($new_mark);
                $new_grade=grade($new_mark);
                if($new_grade!=$grade){
                    $q3="UPDATE full_marks set method='+1',c_mark=$new_mark,grade='$new_grade' where section='$section' and id=$row2[st_id]";
                    $r3=mysqli_query($con,$q3);
                }
                else{
                    $new_mark=$new_mark+1;
                    $new_grade=grade($new_mark);
                    if($new_grade!=$grade){
                        $q3="UPDATE full_marks set method='+2',c_mark=$new_mark,grade='$new_grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                    else{
                        $q3="UPDATE full_marks set method='+0',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                }
            }
            else{
                $new_grade=grade($new_mark);
                if($new_grade!=$grade){
                    $q3="UPDATE full_marks set method='+1',c_mark=$new_mark,grade='$new_grade' where section='$section' and id=$row2[st_id]";
                    $r3=mysqli_query($con,$q3);
                }
                else{
                    $new_mark=$new_mark+1;
                    $new_grade=grade($new_mark);
                    if($new_grade!=$grade){
                        $q3="UPDATE full_marks set method='+2',c_mark=$new_mark,grade='$new_grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                    else{
                        $q3="UPDATE full_marks set method='+0',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                        $r3=mysqli_query($con,$q3);
                    }
                }
            }
        }

        else if($curve=='10√x'){
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            if($ceil==1){
                $initial_full_mark=10*sqrt($initial_full_mark);
                $initial_full_mark=ceil($initial_full_mark);
                $grade=grade($initial_full_mark);
                $q3="UPDATE full_marks set method='10√x',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
            else{
                $initial_full_mark=10*sqrt($initial_full_mark);
                $initial_full_mark=number_format((float)$initial_full_mark,2,'.','');
                $grade=grade($initial_full_mark);
                $q3="UPDATE full_marks set method='10√x',c_mark=$initial_full_mark,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
        }

        else if($curve==1){
            echo "<td class='td1'><b>".$initial_full_mark."</b></td>";
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            $grade_up=$initial_full_mark+3;
            if($grade_up>100){
                $grade_up=100;
            }
            if($ceil==1){
                $grade_up=ceil($grade_up);
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+One Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
            else{
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+One Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
        }

        else if($curve==2){
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            $grade_up=$initial_full_mark+6;
            if($grade_up>100){
                $grade_up=100;
            }
            if($ceil==1){
                $grade_up=ceil($grade_up);
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+Two Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
            else{
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+Two Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
        }

        else if($curve==3){
            $q2="INSERT into full_marks(section,id,i_mark) values('$section',$row2[st_id],$initial_full_mark)";
            $r2=mysqli_query($con,$q2);
            $grade_up=$initial_full_mark+9;
            if($grade_up>100){
                $grade_up=100;
            }
            if($ceil==1){
                $grade_up=ceil($grade_up);
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+Three Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
            else{
                $grade=grade($grade_up);
                $q3="UPDATE full_marks set method='+Three Grade',c_mark=$grade_up,grade='$grade' where section='$section' and id=$row2[st_id]";
                $r3=mysqli_query($con,$q3);
            }
        }

        /////curve///////

    }
echo "<script>window.location.href='grade.php'</script>"; 
?>
</body>
</html>