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


    $fsql="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem' ";
    $fres=mysqli_query($con,$fsql);
    $i=1;
    while($row3=mysqli_fetch_assoc($fres)){
        
        $rq="INSERT into marks values('$section',$row3[st_id],'Attendance',0)";
        $rr=mysqli_query($con,$rq);
 
        for($j=1;$j<=$tot_ct;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'CT$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_quiz;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'Q$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_mid;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'MID$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_final;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'Final$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_assignment;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'Assignment$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        
        for($j=1;$j<=$tot_present;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'Presentation$j',0)";
            $rr=mysqli_query($con,$rq);
        }
        

        for($j=1;$j<=$tot_pro;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'Project$j',0)";
            $rr=mysqli_query($con,$rq);
        }

        for($j=1;$j<=$tot_viva;$j++){
            $rq="INSERT into marks values('$section',$row3[st_id],'VIVA$j',0)";
            $rr=mysqli_query($con,$rq); 
        }
        
        if($lab>0){
            $rq="INSERT into marks values('$section',$row3[st_id],'LAB',0)";
            $rr=mysqli_query($con,$rq);
        }

    if($curve=='bonus'){
        $rq="INSERT into marks values('$section',$row3[st_id],'bonus',0)";
        $rr=mysqli_query($con,$rq);
    }
    echo "</br>";
    
    $i++;
    }
    echo "<script>window.location.href='update_sheet.php'</script>";
?>
</body>
</html>