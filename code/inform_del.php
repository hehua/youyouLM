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
	include 'manage/informlist.php';
    include 'manage/employ_list.php';
	 $informlist = new informlist();
	$num = $_GET['name'];
	$data = $informlist ->get_all_list();
	list($title, $time, $content,$e_id,$readyes) = explode( '|' ,$data[$num]);
?>
<html>
<head>
<meta   http-equiv=refresh   content= '1; url=inform_admin.php'>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>ɾ������</title>
</head>
<body >
   <?php 
   if($informlist ->del_inform($title, $time, $e_id)){
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
  


