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
            $dep=$_SESSION['dep'];
            $sql="select * from course where department='$dep'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_num_rows($result);
            if($row==0){
                echo "<h1 class='lev'>No course has been added from ".$dep." Department</h1>";
                echo "<center><button class='set'><a class='lab' href='course_add.php'>Add Course</a></button></center>";
            }
            else{
                echo "<h2 class='lev'>Course List</h2>";
                ?>
                <div class='search'>
                <form class='search_box'>
                <input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
                <button class='ser' name='go'><i class="fa fa-search"></i></button>
                </form>
                </div>
                </br>
                <?php
                if(@$_GET['done']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['done']?> </div> <?php }
                if(@$_GET['del']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['del']?> </div> <?php }
                if(@$_GET['u1']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['u1']?> </div> <?php }
                if(@$_GET['un']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['un']?> </div> <?php }
                if(@$_GET['run']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['run']?> </div> <?php }
                echo '<div>';
                echo "<table class='tab1'>";
                echo "<tr class='tr1'><th class='th1'>"."Course Code"."</th>";
                echo "<th class='th1'>"."Course Title"."</th>";
                echo "<th class='th1'>"."Course Credit"."</th>";
                echo "<th class='th1'>"."Course Objectives"."</th>";
                echo "<th class='th1'>"."Course Coordinator"."</th>";
                echo "<th class='th1' colspan='4'>"."Actions"."</th></tr>";
                echo "<tbody id='output'>
                </tbody>";
                echo "<tr class='tr1'><td colspan='9' class='td1'><center><button class='set'><a class='lab' href='course_add.php'>Add Course</a></button></center></td></tr>";
                echo "</table></div>";
            }
        ?>
        </br><div><button class='aback'><a href='../C_Home.php' class='lab'>Back</button></div>
        </center>
        <script type="text/javascript">
        $(document).ready(function(){
        function loadTable(){
        $.ajax({
        url : "course_list.php",
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
        url:'course_search.php',
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
<html>