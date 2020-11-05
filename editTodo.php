<?php
require("dbconnect.php");
$msgID=(int)$_POST['id'];
//$msgID=mysqli_real_escape_string($conn,$_POST['id']);
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$important=mysqli_real_escape_string($conn,$_POST['important']);
$im = 0;
if(strcasecmp($important,"緊急")==0){
	$im = 1;
}elseif (strcasecmp($important,"重要")==0) {
	$im = 2;
}elseif (strcasecmp($important,"一般")==0){
	$im = 3;
}
if ($title) {
	$sql = "update todo set title ='$title' , content = '$msg',important ='$im' where id = $msgID ";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:todo $msgID finished.</br>";
echo "<a href='bosstodolist.php'>check to do list</a>" 
?>