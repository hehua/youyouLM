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
     include 'manage/newslist.php';
     
     $elist = new newslist();
     $yes = 1;
     $title = 'ttt';
     $time = '2010-10-10 12:12:12';
     $content = '123333';
     ?><span>正常情况测试</span><br><?php 
     print 'test add_news():';?> <br><?php
     if( $elist ->add_news($title,$time,$content) ){
     	print 'add_news('.$title.','.$time.','.$content.')';?> <br><?php
     	print 'add news successfully';?> <br><?php
     }
     
    
     if( $title.'|'.$time.'|'.$content ==  $elist ->get_news_data($title,$time) )
     {
     	print $title.'|'.$time.'|'.$content.' = '. $elist ->get_news_data($title,$time);?><br><?php
     	print 'add_news() ture';?> <br><br> <br><?php
     	
     }
     
     else{
     	print $title.'|'.$time.'|'.$content.' != '. $elist ->get_news_data($title,$time);?><br><?php
     	print 'add_news() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
     
     print 'test edit_news():';?> <br><?php
     
     if( $elist ->edit_news($title,$time,$title,$time,'hehehehheheh') ){
     	print 'edit_news('.$title.','.$time.','.$title.','.$time.',hehehehheheh)';?> <br><?php
     	print 'edit news successfully';?> <br><?php
     }
     if( $title.'|'.$time.'|'.'hehehehheheh' ==  $elist ->get_news_data($title,$time) )
     {
     	print $title.'|'.$time.'|'.'hehehehheheh'.' = '.$elist ->get_news_data($title,$time);?> <br><?php
     	print 'edit_news() ture ';?> <br><br> <br><?php
     }
     
     else{
     	print $title.'|'.$time.'|'.'hehehehheheh'.' != '.$elist ->get_news_data($title,$time);?> <br><?php
     	print 'edit_news() false ';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
    // $elist ->del_news($title,$time);
     

     
   
     
      print 'test del_news():';?> <br><?php
     
     if( $elist ->del_news($title,$time) ){
     	print 'del_news('.$title.','.$time.')';?> <br><?php
     	print 'del news successfully';?> <br><?php
     }
     if( !$elist ->check_news($title,$time) )
     {
     	print 'check_news('.$title.','.$time.'):';
     	print '公告'.$title.','.$time.'does not exist';?> <br><?php
     	print 'del_news() ture ';?> <br><br><?php
     }
     
     else{
     	print 'check_news('.$title.','.$time.'):';
     	print '公告'.$title.','.$time.' exist';?> <br><?php
     	print 'del_news() false ';?> <br><br><?php
     	$yes = 0;
     }
     
     if( $yes == 1 ){
     	?><span>$yes = 'ture', 本块所有测试均正确</span><br><br><br><br><?php 
     }
     
      
     ?><span>异常情况测试</span><br><?php 
     ?><span>非法添加：</span><br><?php 
     
     print 'test add_news():';?> <br><?php
     if( $elist ->add_news($title,$time,$content) ){
     	print 'add_news('.$title.','.$time.','.$content.') 添加两次，是否有错误提示：';?> <br><?php
     	if( !$elist ->add_news($title,$time,$content) ){
     		?> <br><?php
     		print '第二次添加失败，异常处理成功，add_news() ture ';?> <br><br> <br><?php
     	}
     	else{
     		print '两次添加均成功,add_news() false ';?> <br><br> <br><?php
     	}
     	
     	
     }
     
    
     ?><span>非法删除：</span><br><?php 
     print 'test del_news('.'temp,temp'.')，是否有错误提示：';?> <br><?php
     
     if( !$elist ->del_news('temp','temp') ){
     	?> <br><?php
     	print '有错误提示，del_news() true';?> <br><?php
     }
     else{
     	print '两次添加均成功,add_news() ture ';?> <br><br> <br><?php
     }
   
     //$elist ->del_news($eid)
    

     ?>
  </body>
 </html>    
     
     
     
     