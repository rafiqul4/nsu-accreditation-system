<?php
session_start();
$_SESSION['acode']=$_GET['cor'];
$course=$_SESSION['acode'];
?>
<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<SCRIPT LANGUAGE="javaScript" type="text/javaScript">
window.history.forward()
</SCRIPT>
<body>
    <center>
    <div class='container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg'>
    <h4 class='lev'>Add Course Outcome for <?php echo $course; ?></h4></br></br>
    <div>
        <form method='POST' action='temp_add.php'>
            <div><input class='dna w-100' type='number' min='1' max='20' name='num' placeholder='Enter the number of Course Outcomes'required/></div></br>
            <div><input class='aback' value='Next' type='submit' name='go' /></div>
        </form>
    </div>
    <div class='lev'><b> OR </b></div>
        <div>
        <form method='POST' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <h6><a class='' href="../../Images/CO_add.png" target="_blank"><u>Excel Format</u></a></h6>
            <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
            <div><button name="import" class="bbig">Upload</button></div>
        </form>
        </div>
    </div>
    <button class='aback'><a class='lab' href='course_list.php'>Cancel</a></button>
    </center>
    <?php
    if (isset($_POST["import"])) {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    
        $targetDirectory = "../../uploads/" . $newFileName;
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
    
        require_once("../../connection.php");
        require '../../excelReader/excel_reader2.php';
        require '../../excelReader/SpreadsheetReader.php';
        
        $reader = new SpreadsheetReader($targetDirectory);
        $count = 0;
        $skipValue = 1;
        $tot=0;
        foreach($reader as $key => $col){
            if($count < $skipValue) {
                $count++;
                continue;
            }
            $tw=$col[6];
            $tot=$tw+$tot;
        }
        $count1=0;
        if($tot==100){
            foreach($reader as $key => $col){
            
                if($count1 < $skipValue) {
                    $count1++;
                    continue;
                }
                $co = $col[0];
                $des = $col[1];
                $po= $col[2];
                $bloom = $col[3];
                $del = $col[4];
                $tool = $col[5];
                $wt= $col[6];
                mysqli_query($con, "INSERT INTO co_id VALUES('$course','$co','$des','$po','$bloom','$del','$tool','$wt')");
            }
            echo
            "
            <script>
            alert('Course Outcome Succesfully Added');
            document.location.href = 'course_list.php';
            </script>
            ";

        }
        else{
            echo
            "
            <script>
            alert('Failed to add course outcome. Total weitages has to be 100%');
            document.location.href = 'course_list.php';
            </script>
            ";
        }
    }
    ?>
</body>
</html>