<?php 
include_once 'connection.php'; 
session_start();

$sem=$_SESSION['sem'];
$code=$_SESSION['scode'];
$sec=$_SESSION['sec'];
 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

$fileName = $code.".".$sec." ".$sem.".xls"; 
$fileName =str_replace(' .', '.', $fileName);
 
$fields = array('SL', 'Student ID', 'Student Name', 'Student EMAIL'); 
 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
$query = $con->query("SELECT * FROM student_id where code='$code' and section=$sec and semester='$sem'"); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['sl'], $row['st_id'], $row['st_name'], $row['email']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 

header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
echo $excelData; 
 
exit;
?>