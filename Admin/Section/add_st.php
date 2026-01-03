<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<SCRIPT type="text/javascript">
window.history.forward();
</script>
<body>
<?php
require_once("../../connection.php");
session_start();
$sem=$_SESSION['sem'];
$code=$_GET['code'];
$sec=$_GET['sec'];
$seat=$_GET['seat'];
?>
<center>
<h3 class='lev'>Add Students to section via excel sheet for <?php $section=$code.".".$sec." ".$sem; echo $section=str_replace(' .', '.', $section); ?> </h3>
<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
<h6><a class='' href="../../Images/Student_section.png" target="_blank"><u>Excel Format</u></a></h6>
<form method='POST' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
    <div><button name="import" class="bbig">Upload</button></div>
</form>
</div>
<button class='aback'><a class='lab' href='enroll_st.php'>Cancel</a></button>
</center>
<?php
if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "../../uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require '../../excelReader/excel_reader2.php';
    require '../../excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);
    $count = 0;
    $skipValue = 1;
    foreach($reader as $key => $col){
        $q3="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
        $r3=mysqli_query($con,$q3);
        if(mysqli_num_rows($r3)<$seat){

        if($count < $skipValue) {
            $count++;
            continue;
        }

        $no = $col[0];
        $id = $col[1];
        $name = $col[2];
        $email = $col[3];
        $q1="SELECT * from student_id where code='$code' and semester='$sem' and st_id='$id'";
        $r1=mysqli_query($con,$q1);
        $row1=mysqli_num_rows($r1);
        $q2="SELECT * from student where id='$id' and email = '$email'";
        $r2=mysqli_query($con,$q2);
        $row2=mysqli_num_rows($r2);
        if($row1==0 && $row2>0){
            
            mysqli_query($con, "INSERT INTO student_id VALUES('$code','$sec','$sem',$no,$id,'$name','$email')");
            
        }
        else{
            continue;
        }
    }
    else{
        break;
    }
    }

    echo
    "
    <script>
    alert('Students Succesfully Added');
    document.location.href = 'temp_sec.php?code=$code && sec=$sec && seat=$seat';
    </script>
    ";
}
?>
</body>
</html>