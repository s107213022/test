<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 0 ORDER BY status DESC ,important ASC";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>My Todo List !! </p>
<hr />
<table width="300" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>important</td>
    <td>status</td>
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
  if(strcasecmp($rs['important'],"緊急")==0){
    echo "<td>"."<font color = 'red'>". $rs['important']."</font>"."</td>";
  }elseif (strcasecmp($rs['important'],"重要")==0){
    echo "<td>"."<font color = 'blue'>". $rs['important']."</font>"."</td>";
  }elseif (strcasecmp($rs['important'],"一般")==0){
    echo "<font color=red>"."<td>". $rs['important']."</td>"."</font>";
  }
	echo "<td>"  ;
  echo "<a href='todoSet.php?id={$rs['id']}'>Not finish</a>"."</td></tr>";
}
?>
</table>
</body>
</html>
