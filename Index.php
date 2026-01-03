<html>
<head>
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='Images/mini.png'>
<title>Accreditation Portal</title>
</head>
<body>
<h1 class="head_in"><center>Accreditation Portal</center></h1>
<div class="login">
<center>
	<?php
	    if(@$_GET['Empty']==true){
	 ?>
	<h4><div class="alert-light"><?php echo $_GET['Empty']?></div></h4>
	<?php
	    }
	?>
	<?php
	    if(@$_GET['Invalid']==true){
	 ?>
	    <h4><div class="alert-light"><?php echo $_GET['Invalid']?></div></h4>
	<?php
	    }
	?>
	<div>
	<form action="process.php" method="post">
		<table class="index">
			<tr>
				<td class="lev"><b>Faculty Initial</b></td>
				<td><input type="text" name="initial" class="admi"></td>
			</tr>
			<tr>
				<td class="lev"><b> Password</b></td>
				<td><input type="password" name="password" class="admi"></td>
			</tr>
			<tr>
				<center><td><button class="btn" name="Login"> Login</button></td></center>
			</tr>
		</table>
	</form>
	<div><h5><u><a class="forgot" href='forgot.php'>Forgot your password?</a></u></h5></div>
</center>
</div>
<!--<h5><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="noo">Don't click</a><h5>-->
</body>
</html>