<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../../../Images/mini.png'>
<link rel="stylesheet" href="../../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../CSS/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<center>
<?php 
session_start(); 
$sem=$_SESSION['tsem'];
$dep=$_SESSION['dep'];
?>
</br>
<?php
require_once("../../../connection.php");
$fac=$_SESSION['user'];
$query="SELECT * from section as s,course as c where s.c_code=c.code and c.department='$dep' and semester='$sem'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
    ?>
    <h3 class='lev'>Your Sections</h3>
    <br>
    <div class='search'>
        <form class='search_box'>
        <input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
        <button class='ser' name='go'><i class="fa fa-search"></i></button>
        </form>
    </div>
    <br>
    <table class='tab1'>
    <tr class='tr1'>
    <th class='th1'>Course Code</th>
    <th class='th1'>Section</th>
    <th class='th1'>Semester</th>
    <th class='th1'>room</th>
    <th class='th1'>time</th>
    <th class='th1'>Faculty</th>
    <th class='th1'></th>
    </tr>
    <tbody id="output">
    </tbody>
    <?php
}
else{
    echo "<h3 class='lev'>No section was assigned</h3>";
}
?>
</table>
<br>
<button class='aback'><a class='lab' href='semester.php'>Back</a></button>
</center>
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