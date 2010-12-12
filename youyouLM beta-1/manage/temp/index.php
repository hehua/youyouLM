<?php
  $path="data/center_data.txt";
  $lb_list = file($path);
  $temp_data = trim($lb_list[0]);
  list($id,$password,$name,$address,$phone) = explode('|', trim($temp_data));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php echo $name?>助理管理系统</title>
</head>
<body >
  <h1>悠悠图书馆助理管理系统</h1><br>
<br><br><br><br>
  <h2>登陆</h2>
  <form  method="post" action="signup.php">
    <span class="search_input">用户名: </span><input class="search_text" name="id" type="text"/><br><br>
    <span class="search_input">密码: </span><input class="search_text" name="password" type="text" /><br><br>
   
    <input id="register" type="submit" value="确定"/>
  </form>
  
</body>
</html>