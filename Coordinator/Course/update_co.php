<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<?php 
require_once("../../connection.php");
session_start();
$course=$_SESSION['ucode'];
?>
    <center>
    <div class='container my-5 w-75 bg-white text-light p-2 rounded-4 shadow-lg'>
    <h3 class='lev'>Update <?php echo $course; ?> </h3></br></br>
    <div>
    <form method="POST" id="add_name">  
    <table id="dynamic_field">
    <tr class='lev'>
        <th>SL</th>
        <th>CO Desciption</th>
        <th>POs</th>
        <th>Bloom's taxonomy domain/level</th>
        <th>Delivery methods and activities</th>
        <th>Assessment tools</th>
        <th>CO Wt</th>
        <th></th>
    </tr>
    <?php
    $q1="SELECT * from co_id where code='$course'";
    $r1=mysqli_query($con,$q1);
    $row1=mysqli_num_rows($r1);
    $i=1;
    while($row1=mysqli_fetch_assoc($r1)){
        while($i<=7){
            echo "<tr>";
            echo "<td><input class='dna w-100' name='a1$i' value='$row1[title]' required></td>";
            echo "<td><input class='dna w-100' name='a2$i' value='$row1[Description]' required></td>";
            echo "<td><input class='dna w-100' maxlength='1' name='a3$i' value='$row1[PO]' required></td>";
            echo "<td><input class='dna w-100' name='a4$i' value='$row1[bloom]' required></td>";
            echo "<td><input class='dna w-100' name='a5$i' value='$row1[method]' required></td>";
            echo "<td><input class='dna w-100' name='a6$i' value='$row1[tool]' required></td>";
            echo "<td><input type='number' min='0' max='100' class='dna w-100' name='a7$i' value='$row1[wt]' required></td>";
            echo "<td><button type='button' class='lal'><a class='lab' href='del_one.php?co=$row1[title]'><i class='fa fa-close'></i></a></button></td>";
            echo "</tr>";
            $i++;
            break;
        }
    }
    ?>
    <tfoot>
    <tr>
      <td colspan='8'><center><button type='button' class='big' name='add' id='add'>Add More Outcome</button></center></td>
    </tr>
    </tfoot> 
    <?php
    ?>
    </table>
    </br>
    <button class='aback' id = 'submit'name='update'>Update</button>
    </form>  
    </div>
    </br>
    <div>
        <div class='lev'><b> OR </b></div>
        <form method='POST' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <h6><a class='' href="../../Images/CO_add.png" target="_blank"><u>Excel Format</u></a></h6>
            <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
            <div><button name="import" class="bbig">Upload</button></div>
        </form>
    </div>
    </div>
    <form method='POST'><button class='aback' name='bye'>Back</button></form>
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
            $dq="DELETE from co_id where code='$course'";
            $dr=mysqli_query($con,$dq);
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
    if (isset($_POST["bye"])){
        $dq="DELETE from co_id where code='$course' and wt=0";
        $dr=mysqli_query($con,$dq);
        echo "<script>window.location.href='course_list.php'</script>";
    }
    ?>
<script>  
    $(document).ready(function(){  
        var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" maxlength="3" name="co[]" placeholder="CO Title" class="dna w-100" required/></td><td><input type="text" name="des[]" class="dna w-100" required/></td><td><input type="text" name="po[]" maxlength="2" class="dna w-100" required/></td><td><input type="text" name="bloom[]" class="dna w-100" required/></td><td><input type="text" name="del[]" class="dna w-100" required/></td><td><input type="text" name="as[]" class="dna w-100" required/></td><td><input type="number" min="0" max="100" name="wt[]" class="dna w-100" required/></td><td><button type="button" name="remove" id="'+i+'" class="lal btn_remove"><i class="fa fa-close"></i></button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
      $('#submit').click(function(){            
           $.ajax({  
                url:"update_co_process.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     //alert(data);  
                     $('#add_name')[0].reset();  
                }
           });  
      });    
 });  
</script>
</body>
</html>