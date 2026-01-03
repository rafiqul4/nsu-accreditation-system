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
<center>
<?php
require_once("../../connection.php");
session_start();
$user=$_SESSION['user'];
$sem=$_SESSION['sem'];
$q1="SELECT s.c_code,s.section,s.fac_id
FROM course as c,section as s 
WHERE c.coordinator='$user' and c.code=s.c_code and s.semester='$sem'";
$r1=mysqli_query($con,$q1);
if(mysqli_num_rows($r1)>0){
?>
</br>
<div class='search'>
<form class='search_box'>
<input type='text' id="search" class='sin' placeholder='search' autocomplete="off"/>
<button class='ser' name='go'><i class="fa fa-search"></i></button>
</form>
</div>
</br>
<table class='tab1'>
<tr class='tr1'>
<th class='td1'>course</th>
<th class='td1'>Section NO</th>
<th class='td1'>Faculty</th>
<th class='td1'></th>
</tr>
<tbody id="output">
</tbody>
<?php
}
else{
    echo "<h3 class='lev'>No section has been created for current semester</h3>";
}

?>
</table>
</br>
<button class='aback'><a class='lab' href='../Home.php'>Back</a></button></center>
</center>
</br>
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