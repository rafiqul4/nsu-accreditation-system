<html>
<head>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<title>OBE Admin Login</title>
<script src="https://www.google.com/recaptcha/api.js?render=6LckvSopAAAAAIKuBhMwnhd2YL0U9vftwpgk8SMP"></script>
</head>
<body>
<?php
session_start();
?>
<center><div class="head_in"><h2><center>OBE Admin Login</center></h2></div></center>
<br><br>
<center>
<div class="container my-5 w-25 bg-white p-2 rounded-4 shadow-lg">
	<?php
	    if(isset($_SESSION['uerror'])){
	 ?>
	<h5><div class="alert alert-danger" role="alert"><?php echo $_SESSION['uerror']?></div></h5>
	<?php
	    }
		session_destroy();
	?>
	<div>
	<form action="process" method="post">
		<input type='hidden' id='g-token' name='g-token'>
		<table>
			<tr>
				<td class="lev"><b>User ID</b></td>
				<td><input type="text" name="initial" class="admi" required></td>
			</tr>
			<tr>
				<td class="lev"><b> Password</b></td>
				<td><input type="password" name="password" class="admi" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr><td colspan='2'><center><h6><a class="text-decoration-underline forgot" href='forgot'>Forgot your password?</a></h6></center></td></tr>
			<tr>
				<center><td colspan='2'><button class="aback shadow-lg w-100" name="Login"> Login</button></td></center>
			</tr>
		</table>
	</form>
	</div>
</div>
</center>
<script>
	function getRecaptchaToken() {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LckvSopAAAAAIKuBhMwnhd2YL0U9vftwpgk8SMP', { action: 'homepage' })
                .then(function(token) {
                    document.getElementById("g-token").value = token;
                    scheduleTokenRefresh();
                });
        });
    }
    function scheduleTokenRefresh() {
        setTimeout(function() {
            getRecaptchaToken();
        }, 1000 * 60);
    }
    getRecaptchaToken();
</script>
</body>
</html>