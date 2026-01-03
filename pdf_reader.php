<html>
<head>
<link rel='shortcut icon' type='x-icon' href='Images/mini.png'>
</head>
<body>
<?php
$name=$_GET['name'];
header("content-type: application/pdf");
readfile("files/$name");
?>  
</body>
</html>