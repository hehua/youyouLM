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
<title>��½��</title>
</head>
<body style="background-colorL:gray;">
<span>  �˺Ż�������������µ�¼</span>

</body>
</html>
<?php }
else{
	include 'mydate.php';
	include 'manage/newslist.php';
	$newslist = new newslist();
	$num = $_GET['name'];
	$data = $newslist ->get_news_list();
	list($title,$time,$content) = explode( '|' ,$data[$num]);
?>
<html>
<head>
<meta   http-equiv=refresh   content= '1; url=news_admin.php'>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>ɾ������</title>
</head>
<body >
   <?php 
   if($newslist ->del_news($title, $time)){
   	print "ɾ���ɹ�";
   }
   
   else{
   	print "      ɾ��ʧ��   ";
   }
   ?>
</body>
</html> 



<?php 
     }
?>
  


