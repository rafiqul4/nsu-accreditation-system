<?php require_once("../../connection.php");
?>
<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <center>
        <!--<form method="POST">
        <div><SELECT name="dep" class='sele' required>
        <option hidden disabled selected value class='opt'>Select a Department</option>
          <OPTION Value="ECE" class='opt'>ECE</OPTION>
          <OPTION Value="BBA" class='opt'>BBA</OPTION>
          <OPTION Value="ENG" class='opt'>ENG</OPTION>
          <OPTION Value="MAT" class='opt'>MAT</OPTION>
          <OPTION Value="ENV" class='opt'>ENV</OPTION>
          <OPTION Value="HIS" class='opt'>HIS</OPTION>
        </SELECT><button class='aback' name=''>Next</button><br></div>
        </form>
        </br><div><label class='lev'><b>OR</b></label></div></br>-->
        <form method='POST' action='excel.php' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
        <div><button name="import" class="bbig">Upload</button></div>
        </form>
        <?php
        if(isset($_POST['dep'])){
            $dep=$_POST['dep'];
            $sql="SELECT * from course where department='$dep'";
            $result=mysqli_query($con,$sql);
            $crow=mysqli_num_rows($result);
            if($crow>0){
                ob_end_clean();
                ?>
                <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
                <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <?php
                echo "<center><div class='my-5'><table class='tab1'><class='tab1' tr>";
                echo "<th class='th1'>Course Code</th>";
                echo "<th class='th1'>Course Title</th>";
                echo "<th class='th1'>Course Credit</th>";
                echo "<th class='th1'></th></tr>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr class='tr1'><td>".$row['code']."</td>";
                    echo "<td class='td1'>".$row['title']."</td>";
                    echo "<td class='td1'>".$row['credit']."</td>";
                    echo "<td class='td1'><button class='set'><a class='lab' href='sec_num.php?code=$row[code]'>SELECT</a></button></tr></td>";
                }
                echo "</table>";
            }
            else{
                echo "</div></br> </br>";
                echo "<center><h2 class='lev'>No course has been added from ".$dep." department</h2>";

            }
        }
        ?>
    </div>
    </center><center>
    <button class='aback'><a class='lab' href='sec_create.php'>Cancel</a></button>
    </center>
    </body>
</html>