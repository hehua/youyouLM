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
         include 'manage/informlist.php';
         include 'manage/newslist.php';
	     $informlist = new informlist();
	     $newslist = new newslist();
	     //$newslist->add_news('ahcs','2010-01-03 12:12:33','acscguaqcgqchbwechbjwq');
	     //$informlist->add_inform('yr','2010-02-01 12:12:33','dqwqd','hanks','0');
	    //$informlist->del_inform('yr','2010-02-02 12:12:33','hanks');
	     $data = $newslist->get_news_list();
	     $num = $_GET['name'];
	     list($mytitle, $mytime, $mycontent) = explode( '|' ,$data[$num]);
	     
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
          <span class="newslist_title">���¹���(<?php echo $informlist->get_notread_num($eid)?>)</span><br>
          <?php 
          for( $i = count($data)-1; $i >= 0; $i--){
	     	list($title, $time, $content) = explode( '|' ,$data[$i]);
	     	?>
             <div class="single_news">
                <span class="news_title">
                   <a href="news_single.php?name=<?php echo $i?>">
                     <?php echo (count($data)-$i).'.'.$title?>---��<?php echo $time?>��
                   </a>
                </span>  
             </div>
         
	     	<?php 
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
  


