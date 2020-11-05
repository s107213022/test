<?php
session_start();
require("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>Add New to do</h1>
<form method="post" action="addtodo.php">

      Title: <input name="title" type="text" id="title" /> <br>

      Content: <input name="msg" type="text" id="msg" /> <br>

      Important: <input name="important" type="text" id="important" value="<?php echo "一般"?> " /> <br>
	  
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>