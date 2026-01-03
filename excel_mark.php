<?php 
include_once 'connection.php'; 
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

    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    }     

    $fileName = $section." Mark Sheet".".xls"; 
    $fields=array();
    array_push($fields,'SL', 'Student ID', 'Student Name', 'Attendence(10%)'); 
    for($a=1;$a<=$tot_ct;$a++){
        $q1="SELECT * from questions where section='$section' and exam='CT$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"CT"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_quiz;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Q$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"Q"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_mid;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='MID$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"MID"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_final;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Final$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"Final"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_assignment;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Assignment$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"Assignment"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_present;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Presentation$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"Presentation"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_pro;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='Project$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"Project"."$a"."("."$row1[mark]".")");
        }
    }
    for($a=1;$a<=$tot_viva;$a++){
        $q1="SELECT * from exam_co where section='$section' and exam='VIVA$a'";
        $r1=mysqli_query($con,$q1);
        while($row1=mysqli_fetch_assoc($r1)){
            array_push($fields,"VIVA"."$a"."("."$row1[mark]".")");
        }
    }
    if($lab>0){
        array_push($fields,"LAB"); 
    }
    if($curve=='bonus'){
        array_push($fields,"Bonus Mark");
    }
    $excelData = implode("\t", array_values($fields)) . "\n"; 

    $st_q="SELECT * from student_id where code='$code' and section='$sec' and semester='$sem'";
    $st_r=mysqli_query($con,$st_q);
    while($row_st=mysqli_fetch_assoc($st_r)){
        $lineData = array($row_st['sl'], $row_st['st_id'], $row_st['st_name']); 


            $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Attendance'";
            $r3=mysqli_query($con,$q3);
            $row4=mysqli_fetch_assoc($r3);
            array_push($lineData,$row4['mark']);

            for($j=1;$j<=$tot_ct;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='CT$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_quiz;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Q$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_mid;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='MID$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_final;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Final$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_assignment;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Assignment$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_present;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Presentation$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_pro;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='Project$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }
            for($j=1;$j<=$tot_viva;$j++){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='VIVA$j'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }

            if($lab>0){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='LAB'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }

            if($curve=='bonus'){
                $q3="SELECT * from marks where section='$section' and id='$row_st[st_id]' and exam='bonus'";
                $r3=mysqli_query($con,$q3);
                $row4=mysqli_fetch_assoc($r3);
                array_push($lineData,$row4['mark']);
            }

        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
    



    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
    
    echo $excelData; 
 
exit;
?>