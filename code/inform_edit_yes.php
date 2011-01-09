<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php 
    include 'manage/administrator_list.php';
    session_start();
    $ad_id = $_SESSION['eid'];
    $password = $_SESSION['password'];

    $ad_list = new administrator_list();
    if( ! $ad_list->check_high_account($ad_id,$password) )
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>     
<meta   http-equiv=refresh   content= '1; url=index.html'>
<link rel="stylesheet" type="text/css" href="logining.css" />
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<title>登陆中</title>
</head>
<body style="background-colorL:gray;">
<span>  账号或密码错误，请重新登录</span>

</body>
</html>
<?php }
else{
	include 'mydate.php';
	include 'manage/informlist.php';
	include 'manage/employ_list.php';
	$informlist = new informlist();
	$date = new mydate();
	$title = $_POST['title'];
	$content = $_POST['content'];
	$e_id = $_POST['eid'];
	$oldtitle = $_SESSION['oldtitle'];
	$oldtime = $_SESSION['oldtime'];
	$oldeid = $_SESSION['oldeid'];
	$datetime = $date->now_datetime();
	
     	
?>
<html>
<head>
<meta   http-equiv=refresh   content= '1; url=inform_admin.php'>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>修改公告</title>
</head>
<body >
   <?php 
   if($informlist ->edit_inform($oldtitle,$oldtime,$oldeid, $title, $datetime, $content,$e_id,'0')){
   	print "修改成功";
   }
   
   else{
   	print "      修改失败   ";
   }
   ?>
</body>
</html> 



<?php 
     }
?>
  


