<?php
session_start();
require("dbconnect.php");
$msgID=(int)$_GET['id'];
$sql = "select * from todo where id = $msgID;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
// $rs = mysqli_fetch_assoc($result);
/* if ($rs){
  $title=$rs['title'];
  $msg=$rs['content'];
}*/ 
if ($rs=mysqli_fetch_assoc($result)) { // while 也可以
    $title=$rs['title'];
    $msg=$rs['content'];
    $important=$rs['important'];
}
if($important == 1){
  $important = "緊急";
}elseif ($important == 2) {
	$important = "重要";
}elseif ($important == 3){
	$important = "一般";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>Edit to do</h1>
<form method="post" action="editTodo.php">
    ID: <input name="id" type="text" id="id" readonly="readonly" value="<?php echo htmlspecialchars($msgID)?>"/><br>

    Title: <input name="title" type="text" id="title" value="<?php echo htmlspecialchars($title)?>"/><br>

    Content: <input name="msg" type="text" id="msg" value="<?php echo htmlspecialchars($msg)?>"/> <br>

    Principal: <input name="important" type="text" id="important" value="<?php echo htmlspecialchars($important)?>"/> <br>
	  
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table><a href='bosstodolist.php'>return to do list</a>
</body>
</html>