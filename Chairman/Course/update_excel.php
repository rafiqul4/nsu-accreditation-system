<html>
<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<body>
<center>
</br>
<div class='lev'><h2>Update Course</h2></div>
<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
<form method='POST' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <h6><a class='' href="../../Images/Course_add.png" target="_blank"><u>Excel Format</u></a></h6>
    <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
    <div><button name="import" class="bbig">Upload</button></div>
</form>
</div>
<div><button class='aback'><a href='../C_Home.php' class='lab'>Cancel</button></div>
</center>
<?php
require_once("../../connection.php");
session_start();
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
        
        if($count < $skipValue) {
            $count++;
            continue;
        }
        $dep=$_SESSION['dep'];
        $code = $col[0];
        $title = $col[1];
        $credit= $col[2];
        $cor = $col[3];
        $cq="SELECT * from course where code='$code'";
        $cr=mysqli_query($con,$cq);
        $cw=mysqli_num_rows($cr);
        $cq1="SELECT * from faculty where initial='$cor'";
        $cr1=mysqli_query($con,$cq1);
        $cw1=mysqli_num_rows($cr1);
        if($cw==1 && $cw1==1){
            mysqli_query($con, "UPDATE course set title='$title', credit=$credit,coordinator='$cor' where code='$code'");
        }
        else if($cw==1 && $cw1==0){
            mysqli_query($con, "UPDATE course set title='$title',credit=$credit,coordinator=NULL where code='$code'");
        }
        else{
            continue;
        } 
    }

    echo
    "
    <script>
    alert('Course Succesfully Added');
    document.location.href = 'course_man.php';
    </script>
    ";
}
?>
</body>
</html>