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
<title><?php echo $name?>�������ϵͳ</title>
</head>
<body >
  <h1>����ͼ����������ϵͳ</h1><br>
<br><br><br><br>
  <h2>��½</h2>
  <form  method="post" action="signup.php">
    <span class="search_input">�û���: </span><input class="search_text" name="id" type="text"/><br><br>
    <span class="search_input">����: </span><input class="search_text" name="password" type="text" /><br><br>
   
    <input id="register" type="submit" value="ȷ��"/>
  </form>
  
</body>
</html>