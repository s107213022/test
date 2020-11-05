<?php
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$important = mysqli_real_escape_string($conn,$_POST['important']);
if(strcasecmp($important,"緊急")==0){
	$im = 1;
}elseif (strcasecmp($important,"重要")==0) {
	$im = 2;
}elseif (strcasecmp($important,"一般")==0){
	$im = 3;
}
if ($title) { //if title is not empty
	$sql = "insert into todo (title,content,important) values ('$title', '$msg','$im');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	echo "To do added</br>";
} else {
	echo "Message title cannot be empty</br>";
}
echo "<a href='bosstodolist.php'>check to do list</a>" 
?>