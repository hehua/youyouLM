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
     	 include 'manage/informlist.php';
	     $informlist = new informlist();
	     $num = $_GET['name'];
	     $mydata = $informlist ->get_inform_list($eid);
	     list($mytitle, $mytime, $mycontent,$mye_id,$myreadyes) = explode( '|' ,$mydata[$num]);
	     $informlist ->mark_read($mytitle, $mytime, $mye_id);
	     
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<link rel="stylesheet" type="text/css" href="css/newsdata.css" />
<title>��У��ͼ����������ƽ̨</title>
</head>
<body >


<div class="banner">
     <div class="banner_center">
        <span class="head1">��У��ͼ����������ƽ̨</span><br>
     </div>
</div>

<?php 
        
	    // $informlist->add_inform('newnewnew','2010-02-01 12:12:33','dqwqd','yang','0');
	    //$informlist->del_inform('yr','2010-02-01 12:12:33','hanks');
	     //$notreaddata = $informlist ->get_notread_list($eid);
	     $readdata = $informlist ->get_inform_list($eid);
	     //print 'ddddd';
	     //print_r($data);
?>


<div class="daohang">
     <div class="daohang_center">
        <span  id="daohang_a"> <a href="first.php">�� ҳ</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_single.php?name=0">�ҵ�֪ͨ</a></span>  
       <span class="daohang_words" id="daohang_a"> <a href="news_single.php?name=0">���¹���</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="news_list.html">�ҵ�����</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_add.php">�������</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_single.php?name=0">ͼ����ֲ�</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">�˳�</a></span>
     </div>
</div>

<div class="content">
         <div class="myinform">
          <span class="newslist_title">δ��֪ͨ(<?php echo $informlist->get_notread_num($eid)?>)</span><br>
          <?php 
          for( $i = 0; $i < count($readdata); $i++){
	     	list($title, $time, $content,$e_id,$readyes) = explode( '|' ,$readdata[$i]);
	     	$ename = $informlist->get_name_eid($e_id);
	     	
	     	if( $readyes == '0'){
           ?>
             <div class="single_news">
                <span class="news_title">
                   <a href="inform_single.php?name=<?php echo $i?>">
                     <?php echo ($i+1).'.'.$title?>---to��<?php echo $ename?>��
                   </a>
                </span>  
             </div>
	     	<?php 
            }
	     }
         ?>
         
         <span class="newslist_title">�Ѷ�֪ͨ</span><br>
          <?php 
          for( $j = 0; $j < count($readdata); $j++){
	     	list($title, $time, $content,$e_id,$readyes) = explode( '|' ,$readdata[$j]);
	     	$ename = $informlist->get_name_eid($e_id);
	     	
	     	if( $readyes == '1'){
	     	?>
             <div class="single_news">
                <span class="news_title">
                   <a href="inform_single.php?name=<?php echo $j?>">
                     <?php echo ($j+1).'.'.$title?>---<?php echo $time?>
                   </a>
                </span>  
             </div>
	     	<?php 
	     	}
	     }
         ?>
       </div>
       
     
   

     <div class="news_content">
         <span class="news_content_title"><?php echo $mytitle?></span>
         <span class="news_content_time">����ʱ�䣺<?php echo $mytime?></span>
         <span class="news_content_c">&nbsp &nbsp<?php echo $mycontent?></span>
     </div>
</div>

 </body>
 </html> 



<?php 
     }
?>
  


