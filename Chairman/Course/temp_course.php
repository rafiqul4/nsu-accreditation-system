<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
    <?php
        require_once("../../connection.php");
        session_start();
        $_SESSION['code']=$_GET['cu'];
        $_SESSION['title']=$_GET['tu'];
        $_SESSION['credit']=$_GET['c'];
        header("location:update_course.php");
    ?>
    </body>
</html>