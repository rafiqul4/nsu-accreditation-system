<html>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php
require_once("../../connection.php");
session_start();
$section=$_SESSION['section'];
$quiz=$_SESSION["quiz"];
$ct=$_SESSION["ct"];
$mid=$_SESSION["mid"];
$final1=$_SESSION["final"];
$assignment=$_SESSION["assingment"];
$present=$_SESSION["present"];
$pro=$_SESSION["pro"];
$viva=$_SESSION["viva"];
?>
<center>
<div class="container my-5 w-50 bg-white text-light p-2 rounded-4 shadow-lg">
<form method="POST" enctype="multipart/form-data">
<center><h3 class='lev'><?php echo $section ?></h3></center></br>
<table class='lev'>
<tr>
<th>Exam</th>
<th>Percentage</th>
<th><center>Question</center></th>
</tr>
<?php
for($i=1;$i<=$ct;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='CT$i' value='CT$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='CTW$i' required></td>";
    echo "<td><input id='file' type='file' name='CTF$i' accept='.pdf' required></td>";     
    echo "<tr>";
}
for($i=1;$i<=$quiz;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='Q$i' value='Q$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='QW$i' required></td>";
    echo "<td><input id='file' type='file' name='QF$i' accept='.pdf' required></td>";   
    echo "<tr>";
}
for($i=1;$i<=$mid;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='M$i' value='MID$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='MW$i' required></td>";
    echo "<td><input id='file' type='file' name='MF$i' accept='.pdf' required></td>";      
    echo "<tr>";
}
for($i=1;$i<=$final1;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='F$i' value='Final$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='FW$i' required></td>";
    echo "<td><input id='file' type='file' name='FF$i' accept='.pdf' required></td>";       
    echo "<tr>";
}
for($i=1;$i<=$assignment;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='A$i' value='Assignment$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='AW$i' required></td>";
    echo "<td><input id='file' type='file' name='AF$i' accept='.pdf' required></td>";     
    echo "<tr>";
}
for($i=1;$i<=$present;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='P$i' value='Presentation$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='PW$i'></td>";
    echo "<td><input id='file' type='file' name='PF$i' accept='.pdf'></td>";        
    echo "<tr>";
}
for($i=1;$i<=$pro;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='Pro$i' value='Project$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='ProW$i'></td>";
    echo "<td><input id='file' type='file' name='ProF$i' accept='.pdf'></td>";        
    echo "<tr>";
}
for($i=1;$i<=$viva;$i++){
    echo "<tr>";
    echo "<td><input class='dna w-100' type='text' name='viva$i' value='VIVA$i' readonly></td>";
    echo "<td><input class='dna w-100' type='number' min='0' max='100' name='vivaW$i'></td>";
    echo "<td><input id='file' type='file' name='vivaF$i' accept='.pdf'></td>";        
    echo "<tr>";
}
?>
<tr><td colspan='3'><td></tr>
<tr><td colspan='3'><center><button class='aback' name='submit'>Submit</button></center><td></tr>
</table>
</form>
</div>
<form method="POST">
<button name='back' class='aback'>Cancel</button>
</form>
</center>
<?php
if(isset($_POST['submit'])){
    for($i=1;$i<=$ct;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["CT$i"]."','".$_POST["CTW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$quiz;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["Q$i"]."','".$_POST["QW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$mid;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["M$i"]."','".$_POST["MW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$final1;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["F$i"]."','".$_POST["FW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$assignment;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["A$i"]."','".$_POST["AW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$present;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["P$i"]."','".$_POST["PW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$pro;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["Pro$i"]."','".$_POST["ProW$i"]."')";
        $result=mysqli_query($con,$query);
    }

    for($i=1;$i<=$viva;$i++){
        $query="INSERT into questions(section,exam,marks) values('$section','".$_POST["viva$i"]."','".$_POST["vivaW$i"]."')";
        $result=mysqli_query($con,$query);
    }


    //Files
    for($i=1;$i<=$ct;$i++){
        $fileName = $_FILES["CTF$i"]["name"];
        $fileTmpName = $_FILES["CTF$i"]["tmp_name"];
        $exam="CT".$i;
        $name=$section." ".$exam;
        $path = "../../files/$name"." ".$fileName;
        $final=$name." ".$fileName;
        $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["CT$i"]."'";
        $r1 = mysqli_query($con,$q1);
        if($r1){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($con);
        }
    }

    for($i=1;$i<=$quiz;$i++){
        $fileName = $_FILES["QF$i"]["name"];
        $fileTmpName = $_FILES["QF$i"]["tmp_name"];
        $exam="Q".$i;
        $name=$section." ".$exam;
        $path = "../../files/$name"." ".$fileName;
        $final=$name." ".$fileName;
        $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["Q$i"]."'";
        $r1 = mysqli_query($con,$q1);
        if($r1){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($con);
        }
    }

    for($i=1;$i<=$mid;$i++){
        $fileName = $_FILES["MF$i"]["name"];
        $fileTmpName = $_FILES["MF$i"]["tmp_name"];
        $exam="MID".$i;
        $name=$section." ".$exam;
        $path = "../../files/$name"." ".$fileName;
        $final=$name." ".$fileName;
        $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["M$i"]."'";
        $r1 = mysqli_query($con,$q1);
        if($r1){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($con);
        }
    }

    for($i=1;$i<=$final1;$i++){
        $fileName = $_FILES["FF$i"]["name"];
        $fileTmpName = $_FILES["FF$i"]["tmp_name"];
        $exam="Final".$i;
        $name=$section." ".$exam;
        $path = "../../files/$name"." ".$fileName;
        $final=$name." ".$fileName;
        $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["F$i"]."'";
        $r1 = mysqli_query($con,$q1);
        if($r1){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($con);
        }
    }

    for($i=1;$i<=$assignment;$i++){
        $fileName = $_FILES["AF$i"]["name"];
        $fileTmpName = $_FILES["AF$i"]["tmp_name"];
        $exam="Assignment".$i;
        $name=$section." ".$exam;
        $path = "../../files/$name"." ".$fileName;
        $final=$name." ".$fileName;
        $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["A$i"]."'";
        $r1 = mysqli_query($con,$q1);
        if($r1){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($con);
        }
    }

    for($i=1;$i<=$present;$i++){
        if(empty($_FILES["PF$i"]["name"][0])){ 
            continue; 
        }
        else{
            $fileName = $_FILES["PF$i"]["name"];
            $fileTmpName = $_FILES["PF$i"]["tmp_name"];
            $exam="Presentation".$i;
            $name=$section." ".$exam;
            $path = "../../files/$name"." ".$fileName;
            $final=$name." ".$fileName;
            $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["P$i"]."'";
            $r1 = mysqli_query($con,$q1);
            if($r1){
                move_uploaded_file($fileTmpName,$path);
            }
            else{
                echo "error".mysqli_error($con);
            }
            echo "allo";
        }
    }

    for($i=1;$i<=$pro;$i++){
        if(empty($_FILES["ProF$i"]["name"][0])) { 
            continue;  
        }
        else{   
            $fileName = $_FILES["ProF$i"]["name"];
            $fileTmpName = $_FILES["ProF$i"]["tmp_name"];
            $exam="Project".$i;
            $name=$section." ".$exam;
            $path = "../../files/$name"." ".$fileName;
            $final=$name." ".$fileName;
            $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["Pro$i"]."'";
            $r1 = mysqli_query($con,$q1);
            if($r1){
                move_uploaded_file($fileTmpName,$path);
            }
            else{
                echo "error".mysqli_error($con);
            }
            echo "allo";
        }
        
    }
    
    for($i=1;$i<=$viva;$i++){
        if(empty($_FILES["vivaF$i"]["name"][0])) { 
            continue; 
        }
        else{  
            $fileName = $_FILES["vivaF$i"]["name"];
            $fileTmpName = $_FILES["vivaF$i"]["tmp_name"];
            $exam="VIVA".$i;
            $name=$section." ".$exam;
            $path = "../../files/$name"." ".$fileName;
            $final=$name." ".$fileName;
            $q1 = "UPDATE questions SET filename='$final' where section='$section' and exam='".$_POST["viva$i"]."'";
            $r1 = mysqli_query($con,$q1);
            if($r1){
                move_uploaded_file($fileTmpName,$path);
            }
            else{
                echo "error".mysqli_error($con);
            }
        }
    }

    $q2="SELECT * from co_aprove where section='$section' and status='Disapprove'";
    $r2=mysqli_query($con,$q2);
    if(mysqli_num_rows($r2)>0){
        $q3="UPDATE co_aprove set status=NULL where section='$section'";
        $r3=mysqli_query($con,$q3);
        if($r3){
            echo "<script>window.location.href='section_list.php?'</script>";
        }
    }
    else{
        echo "<script>window.location.href='section_list.php?'</script>";
    }
}
else if(isset($_POST['back'])){
    $dq="DELETE from exam_co where section='$section'";
    $rq=mysqli_query($con,$dq);
    if($rq){
        echo "<script>window.location.href='exam_no.php?'</script>";
    }
}
?>
</body>
</html>