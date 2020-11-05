<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 1";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$num = mysqli_num_rows($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>My finish Todo List !! </p>
<hr />
<table width="300" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>out finish</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
    echo "<td>" , $rs['content'], "</td>";
    echo "<td>"."<a href='todounset.php?id={$rs['id']}'>out finish</a>"."</td>" ;
    echo "</tr>";
}
echo "已完成".$num."筆";
?>
</table>
<a href='bosstodolist.php'>return to do list</a>
</body>
</html>