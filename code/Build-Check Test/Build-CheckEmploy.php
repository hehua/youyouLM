<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>东校区图书馆助理登陆平台</title>
</head>
<body >

<?php 
     include 'manage/employ_list.php';
     
     $elist = new employ_list();
     $yes = 1;
     $eid = 'ttt';
     $name = 'thth';
     $pas = '123';
     $pho = '15017581276';
     $email = '756257670@qq.com';
     ?><span>新建助理账户</span><br><?php 
     print 'test add_employ():';?> <br><?php
     if( $elist ->add_employ($eid,$name,$pas,$pho,$email) ){
     	print 'add_employ('.$eid.','.$name.','.$pas.','.$pho.','.$email.')';?> <br><?php
     	print 'add employ successfully';?> <br><?php
     }
     
    
     if( $eid.'|'.$name.'|'.$pas.'|'.$pho.'|'.$email ==  $elist ->get_eploy_data($eid) )
     {
     	print $eid.'|'.$name.'|'.$pas.'|'.$pho.'|'.$email.' = '. $elist ->get_eploy_data($eid);?><br><?php
     	print 'add_employ() ture';?> <br><br> <br><?php
     	
     }
     
     else{
     	print $eid.'|'.$name.'|'.$pas.'|'.$pho.'|'.$email.' != '. $elist ->get_eploy_data($eid);?> <br><?php
     	print 'add_employ() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
     
     
     print 'test edit_employ():';?> <br><?php
     
     if( $elist ->edit_employ($eid,$name,'change',$pho,$email) ){
     	print 'edit_employ('.$eid.','.$name.',change,'.$pho.','.$email.')';?> <br><?php
     	print 'edit employ successfully';?> <br><?php
     }
     if( $eid.'|'.$name.'|'.'change'.'|'.$pho.'|'.$email ==  $elist ->get_eploy_data($eid) )
     {
     	print $eid.'|'.$name.'change'.'|'.$pho.'|'.$email.' = '.$elist ->get_eploy_data($eid);?> <br><?php
     	print 'add_employ() ture ';?> <br><br> <br><?php
     }
     
     else{
     	print $eid.'|'.$name.'change'.'|'.$pho.'|'.$email.' != $elist ->get_eploy_data($eid)';?> <br><?php
     	print 'edit_employ() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     

     
      print 'test del_employ():';?> <br><?php
     
     if( $elist ->del_employ($eid) ){
     	print 'del_employ('.$eid.')';?> <br><?php
     	print 'del employ successfully';?> <br><?php
     }
     if( !$elist ->check_employ($eid) )
     {
     	print $eid.'does not exist';?> <br><?php
     	print 'del_employ() ture ';?> <br><br><?php
     }
     
     else{
     	print $eid.'still exist';?> <br><?php
     	print 'del_employ() false ';?> <br><br><?php
     	$yes = 0;
     }
     
     if( $yes == 1 ){
     	?><span>$yes = 'ture', 上述本块所有测试均正确</span><br><br><br><br><?php 
     }
     
     
     ?><span>新建异常：</span><br><?php 
     
     print 'test add_employ():';?> <br><?php
     if( $elist ->add_employ($eid,$name,$pas,$pho,$email) ){
     	print 'add_employ('.$eid.','.$name.','.$pas.','.$pho.','.$email.') 添加两次，是否有错误提示：';?> <br><?php
     	if( !$elist ->add_employ($eid,$name,$pas,$pho,$email) ){
     		?> <br><?php
     		print 'add_employ() ture ';?> <br><br> <br><?php
     	}
     	else{
     		print '两次添加均成功,add_employ() ture ';?> <br><br> <br><?php
     	}
     	
     	
     }
     
     
     ?><span>非法删除：</span><br><?php 
     print 'test check_employ('.'temp'.')，是否有错误提示：';?> <br><?php
     
     print 'test del_employ():';?> <br><?php
     if( !$elist ->del_employ('temp') ){
     	?> <br><?php
     	print '有错误提示，del_employ() true';?> <br><?php
     }
     else{
     	print '两次添加均成功,add_employ() ture ';?> <br><br> <br><?php
     }
   
     $elist ->del_employ($eid)
    
     
     
     
     
     ?>
  </body>
 </html>    
     
     
     
     