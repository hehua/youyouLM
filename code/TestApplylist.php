<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>��У��ͼ��������½ƽ̨</title>
</head>
<body >

<?php 
     include 'manage/applylist.php';
     include 'manage/employ_list.php';
     
     $elist = new applylist();
     $yes = 1;
     $title = 'ttt';
     $time = '2011-01-09 16:29:58';
     $content = '123';
     $eid = '15017581276';
     $readyes = '1';
     ?><span>�����������</span><br><?php 
     print 'test add_apply():';?> <br><?php
     if( $elist ->add_apply($title,$time,$content,$eid,$readyes) ){
     	print 'add_apply('.$title.','.$time.','.$content.','.$eid.','.$readyes.')';?> <br><?php
     	print 'add apply successfully';?> <br><?php
     }
     
    
     if( $title.'|'.$time.'|'.$content.'|'.$eid.'|'.$readyes ==  $elist ->get_apply_data($title,$time,$eid) )
     {
     	print $title.'|'.$time.'|'.$content.'|'.$eid.'|'.$readyes.' = '. $elist ->get_apply_data($title,$time,$eid);?><br><?php
     	print 'add_apply() ture';?> <br><br> <br><?php
     	
     }
     
     else{
     	print $title.'|'.$time.'|'.$content.'|'.$eid.'|'.$readyes.' != '. $elist ->get_apply_data($title,$time,$eid);?> <br><?php
     	print 'add_apply() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
     
     
     print 'test edit_apply():';?> <br><?php
     
     if( $elist ->edit_apply($title,$time,$title,$time,'change',$eid,$readyes) ){
     	print 'edit_apply('.$title.','.$time.','.$title.','.$time.',change,'.$eid.','.$readyes.')';?> <br><?php
     	print 'edit apply successfully';?> <br><?php
     }
     if( $title.'|'.$time.'|'.'change'.'|'.$eid.'|'.$readyes ==  $elist ->get_apply_data($title,$time,$eid) )
     {
     	print $title.'|'.$time.'change'.'|'.$eid.'|'.$readyes.' = '.$elist ->get_apply_data($title,$time,$eid);?> <br><?php
     	print 'add_apply() ture ';?> <br><br> <br><?php
     }
     
     else{
     	print $title.'|'.$time.'change'.'|'.$eid.'|'.$readyes.' != $elist ->get_apply_data($title,$time,$eid)';?> <br><?php
     	print 'edit_apply() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     

     
      print 'test del_apply():';?> <br><?php
     
     if( $elist ->del_apply($title,$time,$eid) ){
     	print 'del_apply('.$title.','.$time.','.$eid.')';?> <br><?php
     	print 'del apply successfully';?> <br><?php
     }
     if( !$elist ->check_apply($title,$time,$eid) )
     {
     	print $title.'-'.$time.'-'.$eid.'-'.'does not exist';?> <br><?php
     	print 'del_apply() ture ';?> <br><br><?php
     }
     
     else{
     	print $title.'still exist';?> <br><?php
     	print 'del_apply() false ';?> <br><br><?php
     	$yes = 0;
     }
     
     if( $yes == 1 ){
     	?><span>$yes = 'ture', �����������в��Ծ���ȷ</span><br><br><br><br><?php 
     }
     
     
     ?><span>�쳣�������</span><br><?php 
     ?><span>�Ƿ���ӣ�</span><br><?php 
     
     print 'test add_apply():';?> <br><?php
     if( $elist ->add_apply($title,$time,$content,$eid,$readyes) ){
     	print 'add_apply('.$title.','.$time.','.$content.','.$eid.','.$readyes.') ������Σ��Ƿ��д�����ʾ��';?> <br><?php
     	if( !$elist ->add_apply($title,$time,$content,$eid,$readyes) ){
     		?> <br><?php
     		print 'add_apply() ture ';?> <br><br> <br><?php
     	}
     	else{
     		print '������Ӿ��ɹ�,add_apply() false ';?> <br><br> <br><?php
     	}
     	
     	
     }
     
     
     ?><span>�Ƿ�ɾ����</span><br><?php 
     print 'test check_apply('.'temp'.')���Ƿ��д�����ʾ��';?> <br><?php
     
     print 'test del_apply():';?> <br><?php
     if( !$elist ->del_apply('temp','temp','temp') ){
     	?> <br><?php
     	print '�д�����ʾ��del_apply() true';?> <br><br><?php
     }
     else{
     	print 'sɾ���ɹ�,add_apply() false ';?> <br> <br><?php
     }
   
     if( $yes == 1 ){
     	?><span>$yes = 'ture', �����������в��Ծ���ȷ</span><br><br><br><br><?php 
     }
     $elist ->del_apply($title,$time,$eid);
    
     
     
     
     
     ?>
  </body>
 </html>    
     
     
     
     