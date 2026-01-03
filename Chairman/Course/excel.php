<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
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
        if($cw==0 && $cw1==1){
            mysqli_query($con, "INSERT INTO course VALUES('$code','$title','$credit','$dep','$cor')");
        }
        else if($cw==0 && $cw1==0){
            mysqli_query($con, "INSERT INTO course VALUES('$code','$title','$credit','$dep',NULL)");
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