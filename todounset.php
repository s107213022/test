<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];

if ($msgID) {
	$sql = "update todo set status=0 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:todo $msgID unfinished.</br>";
echo "<a href='todofinish.php'>check unfinish to do list</a>" 
?>