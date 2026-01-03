<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<body>
<?php
require_once("../../connection.php");
session_start();
if(isset($_SESSION['u']))
{
?>
    <form action="execute.php" method="post">
		<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
            <center>
                
                    <table>
                        <tr><th><div><h2 class='lev text-center'>OTP Verification</h2></div><th></tr>
						<tr><td> <?php if(isset($_SESSION['uerror'])){ ?> <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['uerror']?> </div> <?php unset($_SESSION['uerror']); } ?> </td></tr>
                        <tr><td ><div class='lev'>We've sent OTP in your email. If you are the admin Enter the OTP</div></td></tr>
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
	header("Location:index");
}
?>
<script>
    window.onload = function () {
        if (window.performance && window.performance.navigation.type === 2) {
            window.location.href = 'index';
        }
    };
</script>

</body>
</html>