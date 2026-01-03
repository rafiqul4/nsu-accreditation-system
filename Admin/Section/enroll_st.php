<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <body>
    <center>
        <?php 
        require_once("../../connection.php");
        session_start();
        $sem=$_SESSION['sem'];
        if($sem=="New Semester hasn't enrolled yet "){
            echo "<center><h1 class='my-5 lev'>In order to enroll students to section, you will have to go semester management and create a new semester and
            then create sections</h1></center>";

        }
        else{
            $sql="SELECT * from section where semester='$sem'";
            $result=mysqli_query($con,$sql);
            $sem_row=mysqli_num_rows($result);
            if($sem_row==0){
                echo "<center><h1 class='my-5 lev'>In order to enroll students to sections, you will have to go section management and create section</h1></center>";
            }
            else{
                ?>
                <h3 class='lev'>Student Enrollment</h3></br>
                <div class='search'>
                    <form class='search_box'>
                    <input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
                    <button class='ser' name='go'><i class="fa fa-search"></i></button>
                    </form>
                </div>
                </br>
                <?php if(@$_GET['del']==true){
                ?><center> <div class="alert alert-primary w-75" role="alert">
                <p> <?php echo $_GET['del']?> </p>
                </div></center><?php
                }?>
                <table class='tab1 w-75'>
                <thead class='the1'>
                <tr class='tr1'>
                <th class='th1'>Course</th>
                <th class='th1'>Section NO</th>
                <th class='th1'>Semester</th>
                <th class='th1'>Total Seat</th>
                <th class='th1'>Availabe Seat</th>
                <th class='th1'>Facuty</th>
                <th class='th1' colspan='2'>Students</th>
                </tr>
                </thead>
                <tbody id="output">
                </tbody>
                <?php
            }
        }
        ?>
        </table>
        </br><div><button class="aback"><a class='lab' href="../admin_home.php">Back</a></button></div></br>
    </center>
    <script type="text/javascript">
    $(document).ready(function(){
      
      function loadTable(){
      $.ajax({
        url : "info.php",
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
        url:'live_search.php',
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