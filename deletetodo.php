<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "delete from todo where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:$msgID deleted.<br>";
echo "<a href='bosstodolist.php'>check to do list</a>" ;
?>