<html>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <body>
    <div class='signup my-5 p-3'>
    <div>
      <center>
        <h2 class='hed'>New Student</h2>
      </center>
    </div> <?php
if(@$_GET['Empty']==true){
	 				?> <div class="alert-light">
      <center><p> <?php echo $_GET['Empty']?> </p></center>
    </div> <?php
	   					 }
					?> <?php
	    				if(@$_GET['Done']==true){
	 				?> <div class="alert-light">
      <center><p> <?php echo $_GET['Done']?> </p></center>
    </div> <?php
	   					 }
                ?> <?php
                if(@$_GET['p']==true){
             ?> <div class="alert-light">
        <center><p> <?php echo $_GET['p']?> </p></center>
      </div> <?php
                  }
                  ?> <?php
                  if(@$_GET['e']==true){
               ?> <div class="alert-light">
          <center><p> <?php echo $_GET['e']?> </p></center>
        </div> <?php
                    }
              ?> <?php
					?> <?php
	    				if(@$_GET['Stop']==true){
	 				?> <div class="alert-light">
      <center><p> <?php echo $_GET['Stop']?> </p></center>
    </div> <?php
	   					 }
					?> <div>
            <center>
      <form action="add_student_process.php" method="POST">
        <div>
          <input type="text" name="id" maxlength="10" Placeholder='Student ID' class='dn'>
          </br>
          </br>
        <div>
          <input type="text" name="fname" Placeholder='Full Name' class='dn'>
        </div>
        <br>
        <div><input type="number" name="no" min="01300000000" max="01999999999" Placeholder='Phone No' class='dn'></div><br>
        <div><input type="email" class='dn' name="email" maxlength="50" Placeholder='Email' pattern=".+@northsouth.edu" required></div><br>
        <div><SELECT name="dep" class='sele'>
        <option hidden disabled selected value class='opt'>Select a Department</option>
        <?php
          require_once("../connection.php");
          $sql = "SELECT * FROM department";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<OPTION Value='$row[dep]' class='opt'>".$row["dep"]."</OPTION>";
            }
          }
          ?>
        </SELECT><br><br></div>
        <div><button type="submit" name="save_date" class="sub">Add</button></div>
        </br></br>
        <div><label><b>OR</b></label></div>
      </form>
      <h6><a class='' href="../Images/Student_add.png" target="_blank"><u>Excel Format</u></a></h6>
      <form method='POST' action='add_studentxl_process.php' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
      <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
        <div><button name="import" class="bbig">Upload</button></div>
      </form>
      </center>
      </div><br>
      <center><div><button class="aback"><a class='lab' href="admin_home.php">Cancel</a></button></div></center>
      </div>
  </body>
</html>