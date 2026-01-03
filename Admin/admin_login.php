<html>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<body>
<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['u']))
{
?>
<h3 class="lev"><center>admin login</center></h3><br>
		<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
            <center>
                <form action="admin_process.php" method="post">
                    <table>
                        <tr><th><div><h2 class='lev text-center'>OTP Verification</h2></div><th></tr>
						<tr><td> <?php if(@$_GET['Empty']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['Empty']?> </div> <?php } ?> </td></tr>
                        <tr><td> <?php if(@$_GET['invalid']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['invalid']?> </div> <?php } ?> </td></tr>
                        <tr><td ><div class='lev'>We've sent OTP in admin email. If you are the admin Enter the OTP</div></td></tr>
                        <tr><td></br></td></tr>
                        <tr><td><div><input class="dn w-100" type="number" name="name" Placeholder='Enter Code'></div><br></td><tr>
                        <tr><td><div><input class='aback shadow-lg lab w-100' type="submit" value="Submit" name="Login"></div></td>
						<tr></tr>
                    </table>
                </form> 
            </center>
    	</div>
	<form >
<?php 
} 
else{
	header("Location:../index.php");
}
?>
<script>
    window.onload = function () {
        if (window.performance && window.performance.navigation.type === 2) {
            window.location.href = '../destroy.php?destroy';
        }
    };
</script>

</body>
</html>