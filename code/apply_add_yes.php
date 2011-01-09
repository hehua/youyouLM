<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php 
    include 'manage/employ_list.php';
    session_start();
    $eid = $_SESSION['eid'];
    $password = $_SESSION['password'];

    $employ_list = new employ_list();
    if( ! $employ_list->check_account($eid,$password) )
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
	include 'manage/applylist.php';
	$applylist = new applylist();
	$date = new mydate();
	$title = $_POST['title'];
	$content = $_POST['content'];
	$datetime = $date->now_datetime();
	
?>

<html>
<head>
<meta   http-equiv=refresh   content= '1; url=first.php'>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>申请请假</title>
</head>
<body >
   <?php 
   if($applylist->add_apply($title,$datetime,$content,$eid,'0')){
   	print "发送成功";
   }
   
   else{
   	print "      发送失败   ";
   }
   ?>
</body>
</html> 
<?php 
     }
?>
  


