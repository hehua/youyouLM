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
     include 'manage/knowslist.php';
     
     $elist = new knowslist();
     $yes = 1;
     $title = 'ttt';
     $time = '2010-10-10 12:12:12';
     $content = '123333';
     ?><span>�����������</span><br><?php 
     print 'test add_knows():';?> <br><?php
     if( $elist ->add_knows($title,$time,$content) ){
     	print 'add_knows('.$title.','.$time.','.$content.')';?> <br><?php
     	print 'add knows successfully';?> <br><?php
     }
     
    
     if( $title.'|'.$time.'|'.$content ==  $elist ->get_knows_data($title,$time) )
     {
     	print $title.'|'.$time.'|'.$content.' = '. $elist ->get_knows_data($title,$time);?><br><?php
     	print 'add_knows() ture';?> <br><br> <br><?php
     	
     }
     
     else{
     	print $title.'|'.$time.'|'.$content.' != '. $elist ->get_knows_data($title,$time);?><br><?php
     	print 'add_knows() false';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
     
     print 'test edit_knows():';?> <br><?php
     
     if( $elist ->edit_knows($title,$time,$title,$time,'hehehehheheh') ){
     	print 'edit_knows('.$title.','.$time.','.$title.','.$time.',hehehehheheh)';?> <br><?php
     	print 'edit knows successfully';?> <br><?php
     }
     if( $title.'|'.$time.'|'.'hehehehheheh' ==  $elist ->get_knows_data($title,$time) )
     {
     	print $title.'|'.$time.'|'.'hehehehheheh'.' = '.$elist ->get_knows_data($title,$time);?> <br><?php
     	print 'edit_knows() ture ';?> <br><br> <br><?php
     }
     
     else{
     	print $title.'|'.$time.'|'.'hehehehheheh'.' != '.$elist ->get_knows_data($title,$time);?> <br><?php
     	print 'edit_knows() false ';?> <br><br> <br><?php
     	$yes = 0;
     }
     
     
     
     
    // $elist ->del_knows($title,$time);
     

     
   
     
      print 'test del_knows():';?> <br><?php
     
     if( $elist ->del_knows($title,$time) ){
     	print 'del_knows('.$title.','.$time.')';?> <br><?php
     	print 'del knows successfully';?> <br><?php
     }
     if( !$elist ->check_knows($title,$time) )
     {
     	print 'check_knows('.$title.','.$time.'):';
     	print '����'.$title.','.$time.'does not exist';?> <br><?php
     	print 'del_knows() ture ';?> <br><br><?php
     }
     
     else{
     	print 'check_knows('.$title.','.$time.'):';
     	print '����'.$title.','.$time.' exist';?> <br><?php
     	print 'del_knows() false ';?> <br><br><?php
     	$yes = 0;
     }
     
     if( $yes == 1 ){
     	?><span>$yes = 'ture', �������в��Ծ���ȷ</span><br><br><br><br><?php 
     }
     
      
     ?><span>�쳣�������</span><br><?php 
     ?><span>�Ƿ���ӣ�</span><br><?php 
     
     print 'test add_knows():';?> <br><?php
     if( $elist ->add_knows($title,$time,$content) ){
     	print 'add_knows('.$title.','.$time.','.$content.') ������Σ��Ƿ��д�����ʾ��';?> <br><?php
     	if( !$elist ->add_knows($title,$time,$content) ){
     		?> <br><?php
     		print '�ڶ������ʧ�ܣ��쳣����ɹ���add_knows() ture ';?> <br><br> <br><?php
     	}
     	else{
     		print '������Ӿ��ɹ�,add_knows() false ';?> <br><br> <br><?php
     	}
     	
     	
     }
     
    
     ?><span>�Ƿ�ɾ����</span><br><?php 
     print 'test del_knows('.'temp,temp'.')���Ƿ��д�����ʾ��';?> <br><?php
     
     if( !$elist ->del_knows('temp','temp') ){
     	?> <br><?php
     	print '�д�����ʾ��del_knows() true';?> <br><?php
     }
     else{
     	print '������Ӿ��ɹ�,add_knows() ture ';?> <br><br> <br><?php
     }
   
     //$elist ->del_knows($eid)
    

     ?>
  </body>
 </html>    
     
     
     
     