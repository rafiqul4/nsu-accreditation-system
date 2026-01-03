<?php
require_once("../../connection.php");
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

        $code = $col[0];
        $sec = $col[1];
        $sem= $col[2];
        $room = $col[3];
        $time = $col[4];
        $seat=$col[5];
        $fac = $col[6];
        $cq="SELECT * from faculty where initial='$fac'";
        $cr=mysqli_query($con,$cq);
        $cw=mysqli_num_rows($cr);
        if($cw>0){
            mysqli_query($con, "UPDATE section set fac_id='$fac' where c_code='$code' and section=$sec and semester='$sem'");
        }
        else{
            continue;
        }
    }

    echo
    "
    <script>
    alert('Faculties Succesfully Added');
    document.location.href = 'section_man.php';
    </script>
    ";
}
?>





