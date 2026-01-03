<html>
<head>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
require_once("../../connection.php");
session_start();
if(isset($_SESSION['temp_dep'])){
    if(isset($_GET['in'])){
        $initial=$_SESSION['temp_in'];
    }
    
    $dep=$_SESSION['temp_dep'];
    $fn=$_SESSION['temp_fn'];
    $q1="select * from faculty where department='".$dep."'";
    $r1=mysqli_query($con,$q1);
    if(mysqli_num_rows($r1) == 0){
        echo "<center>"."<h1 class='hom'>"."No faculty available in ".$dep." department"."</h1>"."</center>";
        echo "<center>"."<button class='aback'>"."<a class='lab' href='chair_manage.php'>"."back"."</a>"."</button>"."</center>";
    }
    else if(mysqli_num_rows($r1) > 0){
        echo '<br>';
        echo "<center>";
        ?>
        <div class='search'>
            <form class='search_box'>
                <input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
                <button class='ser' name='go'><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php
        echo"<table class='tab1'>";
        echo "<thead class='the1'>";
        echo "<tr class='tr1'>";
        echo "<th class='th1'>"."<b>"."Intitial"."</b>"."</th>";
        echo "<th class='th1'>"."<b>"."Name"."</b>"."</th>";
        echo "<th class='th1'>"."<b>"."Department"."</b>"."</th>";
        echo "<th class='th1'>"."<b>".""."</b>"."</th>";
        echo "</tr>";
        echo "</thead>";
        ?>
        <tbody id="output">
        </tbody>
        <?php
        echo "</table>";
        echo "</center>";
        echo '<br>';
        echo "<center>"."<button class='aback'>"."<a class='lab' href='chair_manage.php'>"."Cancel"."</a>"."</button>"."</center>";
    }
}
else{
    header("Location:../../index.php");
}

?>

<script type="text/javascript">
    $(document).ready(function(){
      
      function loadTable(){
      $.ajax({
        url : "list.php",
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
        url:'search.php',
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