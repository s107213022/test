<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo ORDER BY status DESC ,important ASC;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>My Todo List sort!! </p>
<hr />
<table width="300" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>status</td>
    <td>important</td>
    <td>edit</td>
    <td>over</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
  if($rs['important'] == 1){
    $rs['important'] = "緊急";
  }elseif ($rs['important'] == 2) {
    $rs['important'] = "重要";
  }elseif ($rs['important'] == 3){
    $rs['important'] = "一般";
  }
	  echo "<tr><td>" . $rs['id'] . "</td>";
	  echo "<td>{$rs['title']}</td>";
    echo "<td>" , $rs['content'], "</td>";
    echo "<td>"  ;
    if($rs['status'] == 0){
      echo "<a href='todoSet.php?id={$rs['id']}'>Unfinish</a>"."</td>" ;
    }else{
      echo "<a href='todounset.php?id={$rs['id']}'>Finish</a>"."</td>" ;
    }
    echo "<td>" , $rs['important'], "</td>";
    echo "<td>";
    echo "<a href='editTodoForm.php?id={$rs['id']}'>&nbsp&nbspEdit</a>" . "</td>";
    echo "<td>"."<a href='deletetodo.php?id={$rs['id']}'>&nbsp&nbspOver</a>" . "</td></tr>";
}
?>
</table>
<a href="addTodoForm.php">add todo list</a>
<a href='bosstodolist.php'>return normal to do list</a>
</body>
</html>