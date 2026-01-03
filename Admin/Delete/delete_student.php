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
            $sql="SELECT * from student";
            $result=mysqli_query($con,$sql);
            $_row=mysqli_num_rows($result);
            if($_row==0){
                echo "<center><h1 class='my-5 lev'>No student found</h1></center>";
            }
            else{
                ?>
                <h3 class='lev'>List of students</h3></br>
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
                <th class='th1'>id</th>
                <th class='th1'>name</th>
                <th class='th1'>phone_number</th>
                <th class='th1'>email</th>
                <th class='th1'></th>
                </tr>
                </thead>
                <tbody id="output">
                </tbody>
                <?php
            }
        ?>
        </table>
        </br><div><button class="aback"><a class='lab' href="../admin_home.php">Back</a></button></div></br>
    </center>
    <script type="text/javascript">
    $(document).ready(function(){
      
      function loadTable(){
      $.ajax({
        url : "student_list.php",//whole list file theke naam dibo
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
        url:'student_search.php',// live search file 6theke naam dibo
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
</html