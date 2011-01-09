<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>Build/Check</title>
</head>
<body >

<?php 
     include 'manage/administrator_list.php';
     
     $elist = new administrator_list();
     $yes = 1;
     $eid = 'ttt';
     $name = 'thth';
     $pas = '123';
     $power = '2';
     ?><span>账户新建与密码核实</span><br><?php 
     print 'test add_administrator():';?> <br><?php
     if( $elist ->add_administrator($eid,$name,$pas,$power) ){
     	print 'add_administrator('.$eid.','.$name.','.$pas.','.$power.')';?> <br><?php
     	print 'add administrator successfully';?> <br><?php
     }
     
    
     if( $eid.'|'.$name.'|'.$pas.'|'.$power ==  $elist ->get_administrator_data($eid) )
     {
     	print $eid.'|'.$name.'|'.$pas.'|'.$power.' = '. $elist ->get_administrator_data($eid);?><br><?php
     	print 'add_administrator() ture';?> <br><br> <br><?php
     	
     }
     
     else{
     	print $eid.'|'.$name.'|'.$pas.'|'.$power.' != '. $elist ->get_administrator_data($eid);?> <br><?php
     	print 'add_administrator() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
     
     
     print 'test edit_administrator():';?> <br><?php
     
     if( $elist ->edit_administrator($eid,$name,'change',$power) ){
     	print 'edit_administrator('.$eid.','.$name.',change,'.$power.')';?> <br><?php
     	print 'edit administrator successfully';?> <br><?php
     }
     if( $eid.'|'.$name.'|'.'change'.'|'.$power ==  $elist ->get_administrator_data($eid) )
     {
     	print $eid.'|'.$name.'change'.'|'.$power.' = '.$elist ->get_administrator_data($eid);?> <br><?php
     	print 'add_administrator() ture ';?> <br><br> <br><?php
     }
     
     else{
     	print $eid.'|'.$name.'change'.'|'.$power.' != $elist ->get_administrator_data($eid)';?> <br><?php
     	print 'edit_administrator() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     

     
      print 'test del_administrator():';?> <br><?php
     
     if( $elist ->del_administrator($eid) ){
     	print 'del_administrator('.$eid.')';?> <br><?php
     	print 'del administrator successfully';?> <br><?php
     }
     if( !$elist ->check_administrator($eid) )
     {
     	print $eid.'does not exist';?> <br><?php
     	print 'del_administrator() ture ';?> <br><br><?php
     }
     
     else{
     	print $eid.'still exist';?> <br><?php
     	print 'del_administrator() false ';?> <br><br><?php
     	$yes = 0;
     }
     
     if( $yes == 1 ){
     	?><span>$yes = 'ture', 上述本块所有测试均正确</span><br><br><br><br><?php 
     }
     
     
     ?><span>异常测试</span><br><?php 
     ?><span>非法添加：</span><br><?php 
     
     print 'test add_administrator():';?> <br><?php
     if( $elist ->add_administrator($eid,$name,$pas,$power) ){
     	print 'add_administrator('.$eid.','.$name.','.$pas.','.$power.') 添加两次，是否有错误提示：';?> <br><?php
     	if( !$elist ->add_administrator($eid,$name,$pas,$power) ){
     		?> <br><?php
     		print 'add_administrator() ture ';?> <br><br> <br><?php
     	}
     	else{
     		print '两次添加均成功,add_administrator() ture ';?> <br><br> <br><?php
     	}
     	
     	
     }
     
     
     ?><span>非法删除：</span><br><?php 
     print 'test check_administrator('.'temp'.')，是否有错误提示：';?> <br><?php
     
     print 'test del_administrator():';?> <br><?php
     if( !$elist ->del_administrator('temp') ){
     	?> <br><?php
     	print '有错误提示，del_administrator() true';?> <br><?php
     }
     else{
     	print '两次添加均成功,add_administrator() ture ';?> <br><br> <br><?php
     }
   
     $elist ->del_administrator($eid);
    if( $yes == 1 ){
     	?><span>$yes = 'ture', 上述本块所有测试均正确</span><br><br><br><br><?php 
     }
     
     
     
     
     ?>
  </body>
 </html>    
     
     
     
     