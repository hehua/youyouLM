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
<title>��½��</title>
</head>
<body style="background-colorL:gray;">
<span>  �˺Ż�������������µ�¼</span>

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
<title>�������</title>
</head>
<body >
   <?php 
   if($applylist->add_apply($title,$datetime,$content,$eid,'0')){
   	print "���ͳɹ�";
   }
   
   else{
   	print "      ����ʧ��   ";
   }
   ?>
</body>
</html> 
<?php 
     }
?>
  


