<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
require_once("../../connection.php");
session_start();
$sem=$_SESSION['sem'];
if($sem=="New Semester hasn't enrolled yet "){
    echo "<center><h1 class='my-5 lev'>No Semester is enrolled</h1></center>";
}
else{
    $sql="SELECT * from section where semester='$sem'";
    $result=mysqli_query($con,$sql);
    $sem_row=mysqli_num_rows($result);
    if($sem_row==0){
        echo "<center><h1 class='my-5 lev'>In order to assign faculty to sections, Admin has to create section first</h1></center>";
    }
    else{
        ?>
        <center>
        <h3 class='lev'>Faculty Enrollment</h3></br>
        <div class='container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg'>
        <h6><a class='' href="../../Images/Faculty_add.png" target="_blank"><u>Excel Format</u></a></h6>
        <form method='POST' action='excel.php' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data"> 
        <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
        <div><button name="import" class="bbig">Upload</button></div>
        </form>
        </div>
        <div class='search'>
        <form class='search_box'>
        <input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
        <button class='ser' name='go'><i class="fa fa-search"></i></button>
        </form>
        </div>
        </br>
        <?php if(@$_GET['done']==true) { ?> <div class="alert alert-primary w-75" role="alert"><center><p> <?php echo $_GET['done']?> </p></center></div> <?php } ?>
        <table class='tab1 w-75'>
        <tr class='tr1'>
        <th class='th1'>Course</th>
        <th class='th1'>Section NO</th>
        <th class='th1'>Semester</th>
        <th class='th1'>Total Seat</th>
        <th class='th1'>Facuty</th>
        <th class='th1'></th>
        </tr>
        <tbody id="output">
        </tbody>
        <?php
    }
}
?>
</table>
</br><div><button class="aback"><a class='lab' href="../C_home.php">Back</a></button></div></br>
</center>
<script type="text/javascript">
    $(document).ready(function(){
      
      function loadTable(){
      $.ajax({
        url : "sec_list.php",
        type : "POST",
        success : function(data){
          $("#output").html(data);
        }
      });
    }
    loadTable();

    $("#search").on("keyup",function(){
      $.ajax({
        type:'POST',
        url:'search_list.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>