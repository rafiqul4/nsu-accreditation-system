<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<body>
<center>
        <h2 class="lev">Set Department and Chairman</h2>
        </center>
        <div class="container my-5 w-50 bg-white text-light p-2 rounded-4 shadow-lg">
        <center>
        <form action="" method="POST" class="up">
        <table>
        <tr><td>
        <?php
            if(@$_GET['dEmpty']==true){
            ?><center> <div class="alert alert-primary" role="alert">
            <p> <?php echo $_GET['dEmpty']?> </p>
            </div></center><?php
            }
            if(@$_GET['nEmpty']==true){
                ?><center> <div class="alert alert-primary">
                <p> <?php echo $_GET['nEmpty']?> </p>
                </div></center><?php
            }
	        if(@$_GET['Stop']==true){
	        ?><center> <div class="alert alert-primary">
            <p> <?php echo $_GET['Stop']?> </p>
            </div></center><?php
	    }
        ?>
        </td></tr>
        <tr>
        <td>
        <input name="dep" class='dna' Placeholder="Department Initial" required>  
        </td>
        </tr><tr>
        <td>
        <input Placeholder="Department Name" name="name" class="dna" required>
        </td>    
        </tr>
        <tr>
        <tr><td></td></tr><tr><td></td></tr>   
        <td> 
        <center><button type="submit" name="save" class="dsub">Add</button></div></center>
        </td>
        </tr>
        </table>
      </form>
    </div>    
      <?php
      require_once("../../connection.php");
      if(isset($_POST['save']))
      {
        $depa=$_POST['dep'];
        $nam=$_POST['name'];
        $check="select dep from department where dep='".$_POST['dep']."'";
        $cres=mysqli_query($con,$check);
        if(empty($_POST['name'])){
            header("location:new_dep.php?nEmpty=please give the name of the department");
        }
        if(empty($_POST['dep'])){
            header("location:new_dep.php?dEmpty=please select a department");
        }
        else if(!empty($_POST['name']) && !empty($_POST['dep']) && mysqli_num_rows($cres) > 0){
            header("location:new_dep.php?Stop=Department already exists");
        }
        else if(!empty($_POST['name']) && !empty($_POST['dep']) && mysqli_num_rows($cres) == 0){
        $dq="INSERT INTO department(dep,dep_name,c_initial,name)
        VALUES ('$depa','$nam',NULL,NULL)";
        $dr=mysqli_query($con,$dq);
        if($dr){
            header("location:chair_manage.php");
        }
        }
      }    
      ?>
      <center><div><button class="aback"><a class='lab' href="chair_manage.php">Back</a></button></div></center>
    </center>
</body>
</html>