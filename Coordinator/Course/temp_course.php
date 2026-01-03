<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
    <?php
        require_once("../../connection.php");
        session_start();
        $_SESSION['ucode']=$_GET['uc'];
        header("location:update_co.php");
    ?>
    </body>
</html>