<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
    <?php
        require_once("../../connection.php");
        session_start();
        $_SESSION['scode']=$_GET['code'];
        $_SESSION['sec']=$_GET['sec'];
        $_SESSION['seat']=$_GET['seat'];
        header("location:update_st.php");
    ?>
    </body>
</html>