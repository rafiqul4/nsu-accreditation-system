<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<SCRIPT type="text/javascript">
    window.history.forward();
</script>
</head>
<body>
<center>
<?php
session_start();
require_once("../../connection.php");
$section=$_SESSION["section"];
$sql="SELECT * from exam_co where section='$section'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$q1="SELECT * from exam_co where section='$section' and exam like 'Q%'";
$r1=mysqli_query($con,$q1);
$tot_quiz=mysqli_num_rows($r1);
$q2="SELECT * from exam_co where section='$section' and exam like 'CT%'";
$r2=mysqli_query($con,$q2);
$tot_ct=mysqli_num_rows($r2);
$q3="SELECT * from exam_co where section='$section' and exam like 'MID%'";
$r3=mysqli_query($con,$q3);
$tot_mid=mysqli_num_rows($r3);
$q4="SELECT * from exam_co where section='$section' and exam like 'Final%'";
$r4=mysqli_query($con,$q4);
$tot_final=mysqli_num_rows($r4);
$q5="SELECT * from exam_co where section='$section' and exam like 'Assignment%'";
$r5=mysqli_query($con,$q5);
$tot_assignment=mysqli_num_rows($r5);
$q6="SELECT * from exam_co where section='$section' and exam like 'Presentation%'";
$r6=mysqli_query($con,$q6);
$tot_present=mysqli_num_rows($r6);
$q7="SELECT * from exam_co where section='$section' and exam like 'Project%'";
$r7=mysqli_query($con,$q7);
$tot_pro=mysqli_num_rows($r7);
$q8="SELECT * from exam_co where section='$section' and exam like 'VIVA%'";
$r8=mysqli_query($con,$q8);
$tot_viva=mysqli_num_rows($r8);
?>
<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
<form method='POST'>
<table class='lev'>
<tr>
<th><center>Assesments</center></th>
<th><center>Total Assesments</center></th>
<th><center>Best Count</center></th>
<th><center>Percentage</center></th>
</tr>
<?php
if($tot_ct>0){
    echo "<tr>";
    echo "<td><center>CT</center></td>";
    echo "<td><center>".$tot_ct."</center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='ct' min='1' max='$tot_ct' value='$tot_ct' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='pct' min='0' max='100' value='0' required/></center></td>";
    echo "</tr>";
}

if($tot_quiz>0){
    echo "<tr>";
    echo "<td><center>Quiz</center></td>";
    echo "<td><center>".$tot_quiz."</center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='quiz' min='1' max='$tot_quiz' value='$tot_quiz' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='pquiz' min='0' max='100' value='0'  required/></center></td>";
    echo "</tr>";
}

if($tot_mid>0){
    echo "<tr>";
    echo "<td><center>MID</center></td>";
    echo "<td><center>".$tot_mid."</center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='mid' min='1' max='$tot_mid' value='$tot_mid' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='pmid' min='0' max='100' value='0'  required/></center></td>";
    echo "</tr>";
}

if($tot_final>0){
    echo "<tr>";
    echo "<td><center>Final</center></td>";
    echo "<td><center>".$tot_final."</center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='final' min='1' max='$tot_final' value='$tot_final' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='pfinal' min='0' max='100' value='0'  required/></center></td>";
    echo "</tr>";
}

if($tot_assignment>0){
    echo "<tr>";
    echo "<td><center>Assignment</td></center>";
    echo "<td><center>".$tot_assignment."</center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='assignment' min='1' max='$tot_assignment' value='$tot_assignment' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='passignment' min='0' value='0'  max='100' required/></center></td>";
    echo "</tr>";
}

if($tot_present>0){
    echo "<tr>";
    echo "<td><center>Presentation</td>";
    echo "<td><center>".$tot_present."</td>";
    echo "<td><center><input class='dna w-100' type='number' name='present' min='1' max='$tot_present' value='$tot_present' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='ppresent' min='0' max='100' value='0'  required/></center></td>";
    echo "</tr>";
}

if($tot_pro>0){
    echo "<tr>";
    echo "<td><center>Project</td>";
    echo "<td><center>".$tot_pro."</td>";
    echo "<td><center><input class='dna w-100' type='number' name='project' min='1' max='$tot_pro' value='$tot_pro' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='ppro' min='0' max='100' value='0'  required/></center></td>";
    echo "</tr>";
}

if($tot_viva>0){
    echo "<tr>";
    echo "<td><center>VIVA</td>";
    echo "<td><center>".$tot_viva."</td>";
    echo "<td><center><input class='dna w-100' type='number' name='viva' min='1' max='$tot_viva' value='$tot_viva' required/></center></td>";
    echo "<td><center><input class='dna w-100' type='number' name='pviva' min='0' max='100' value='0' required/></center></td>";
    echo "</tr>";
}
?>
<tr><td></br></td></tr>
<tr>
<td>Attendence</td>
<td></td>
<td></td>
<td><input class='dna w-100' type='number' min='5' max='20' value='5' name='attendence' required>
</tr>
<tr><td></br></td></tr>
<tr>
<td>Lab Percentage</td>
<td></td>
<td></td>
<td><input class='dna w-100' type='number' min='0' max='80' value='0' name='lab' required>
</tr>
<tr><td></br></td></tr>
<tr>
<td>Include Curving</td>
<td colspan='3'><center>
<SELECT name="curve" class='sele'>
    <OPTION Value="0" class='opt'>No</OPTION>
    <OPTION Value="inc" class='opt'>Grade Bump</OPTION>
    <OPTION Value="bonus" class='opt'>Bonus Mark</OPTION>
    <OPTION Value="10√x" class='opt'>10√x</OPTION>
    <OPTION Value="1" class='opt'>One Grade Increase</OPTION>
    <OPTION Value="2" class='opt'>Two Grade Increase</OPTION>
    <OPTION Value="3" class='opt'>Three Grade Increase</OPTION>
</SELECT>
</center>
</td>
</tr>
</tr>
<tr><td></br></td></tr>
<tr><td colspan='4'><center><input type="checkbox" id="myCheck" name='check' value='1'><b> &nbsp Ceil Total Marks</b></center></td></tr>
<tr><td></br></td></tr>
<tr><td colspan='4'><center><button class='aback' name='go'>Next</button></center></td></tr>
</table>
</form>
</div>
<button class='aback'><a class='lab' href='section_list.php'>Cancel</a></button>
</center>
<?php
if(isset($_POST['go'])){
    if($tot_ct>0){
        $best_ct=$_POST['ct'];
        $_SESSION['bct']=$best_ct;
        $_SESSION['pct']=$_POST['pct'];
    }
    else{
        $best_ct=0;
        $_SESSION['bct']=$best_ct;
        $_SESSION['pct']=0;
    }

    if($tot_quiz>0){
        $best_quiz=$_POST['quiz'];
        $_SESSION['bq']=$best_quiz;
        $_SESSION['pquiz']=$_POST['pquiz'];
    }
    else{
        $best_quiz=0;
        $_SESSION['bq']=$best_quiz;
        $_SESSION['pquiz']=0;
    }

    if($tot_mid>0){
        $best_mid=$_POST['mid'];
        $_SESSION['bmid']=$best_mid;
        $_SESSION['pmid']=$_POST['pmid'];
    }
    else{
        $best_mid=0;
        $_SESSION['bmid']=$best_mid;
        $_SESSION['pmid']=$_POST['pmid'];
    }

    if($tot_final>0){
        $best_final=$_POST['final'];
        $_SESSION['bfinal']=$best_final;
        $_SESSION['pfinal']=$_POST['pfinal'];
    }
    else{
        $best_final=0;
        $_SESSION['bfinal']=$best_final;
        $_SESSION['pfinal']=0;
    }

    if($tot_assignment>0){
        $best_assignment=$_POST['assignment'];
        $_SESSION['bass']=$best_assignment;
        $_SESSION['passingemnt']=$_POST['passignment'];
    }
    else{
        $best_assignment=0;
        $_SESSION['bass']=$best_assignment;
        $_SESSION['passingemnt']=0;
    }

    if($tot_present>0){
        $best_present=$_POST['present'];
        $_SESSION['bpresent']=$best_present;
        $_SESSION['ppresent']=$_POST['ppresent'];
    }
    else{
        $best_present=0;
        $_SESSION['bpresent']=$best_present;
        $_SESSION['ppresent']=0;
    }
    
    if($tot_pro>0){
        $best_pro=$_POST['project'];
        $_SESSION['bpro']=$best_pro;
        $_SESSION['ppro']=$_POST['ppro'];
    }
    else{
        $best_pro=0;
        $_SESSION['bpro']=$best_pro;
        $_SESSION['ppro']=0;
    }

    if($tot_viva>0){
        $best_viva=$_POST['viva'];  
        $_SESSION['bviva']=$best_viva; 
        $_SESSION['pviva']=$_POST['pviva']; 
    }
    else{
        $best_viva=0; 
        $_SESSION['bviva']=$best_viva;
        $_SESSION['pviva']=0;
    }

    if(empty($_POST['check'])){
        $ceil=0;
    }
    else {
        $ceil=$_POST['check'];
    }


    ///////
    

    $_SESSION['lab']=$_POST['lab'];
    $_SESSION['curve']=$_POST['curve'];
    $_SESSION['attendence']=$_POST['attendence'];
    $_SESSION['ceil']=$ceil;

    $_SESSION['tct']=$tot_ct;
    $_SESSION['tquiz']=$tot_quiz;
    $_SESSION['tmid']=$tot_mid;
    $_SESSION['tfinal']=$tot_final;
    $_SESSION['tassingemnt']=$tot_assignment;
    $_SESSION['tpresent']=$tot_present;
    $_SESSION['tpro']=$tot_pro;
    $_SESSION['tviva']=$tot_viva;

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

    $total=$p_ct+$p_quiz+$p_mid+$p_final+$p_assignment+$p_present+$p_pro+$p_viva+$attendence+$lab;
    if($total==100){
        $exam_sql="INSERT into exam_detail values('$section','Attendence',NULL,NULL,$attendence)";
        $exam_result=mysqli_query($con,$exam_sql);

        $exam_sql="INSERT into exam_detail values('$section','LAB',NULL,NULL,$lab)";
        $exam_result=mysqli_query($con,$exam_sql);

        if($tot_ct>0){
            $exam_sql="INSERT into exam_detail values('$section','CT',$tot_ct,$best_ct,$p_ct)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_quiz>0){
            $exam_sql="INSERT into exam_detail values('$section','Quiz',$tot_quiz,$best_quiz,$p_quiz)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_mid>0){
            $exam_sql="INSERT into exam_detail values('$section','MID',$tot_mid,$best_mid,$p_mid)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_final>0){
            $exam_sql="INSERT into exam_detail values('$section','Final',$tot_final,$best_final,$p_final)";
            $exam_result=mysqli_query($con,$exam_sql);
        }
        
        if($tot_assignment>0){
            $exam_sql="INSERT into exam_detail values('$section','Assignment',$tot_assignment,$best_assignment,$p_assignment)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_present>0){
            $exam_sql="INSERT into exam_detail values('$section','Presentation',$tot_present,$best_present,$p_present)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_pro>0){
            $exam_sql="INSERT into exam_detail values('$section','Project',$tot_pro,$best_pro,$p_pro)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        if($tot_viva>0){
            $exam_sql="INSERT into exam_detail values('$section','VIVA',$tot_viva,$best_viva,$p_viva)";
            $exam_result=mysqli_query($con,$exam_sql);
        }

        $exam_sql="INSERT into curve values('$section','$curve',$ceil)";
        $exam_result=mysqli_query($con,$exam_sql);

        echo "<script>window.location.href='grade_sheet.php'</script>";
    }
    else if($total!=100){
       echo "<script>alert('Total Mark has to be equal to 100%')</script>";
    }
}
?>
</body>
</html>