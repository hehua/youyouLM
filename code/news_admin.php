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
     	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/Login.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/newsadmin.css" />
<link rel="stylesheet" type="text/css" href="css/public.css" />
<title>��У��ͼ����������ƽ̨</title>
</head>
<body >


<div class="banner">
     <div class="banner_center">
        <span class="head1">��У��ͼ����������ƽ̨</span><br>
     </div>
</div>


<div class="daohang">
     <div class="daohang_center">
        <span  id="daohang_a"> <a href="admin.php">�� ҳ</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_admin.php">֪ͨ����</a></span>      
       <span class="daohang_words" id="daohang_a"> <a href="news_admin.php">�������</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_single.php?name=0">��ٴ���</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_admin.php">ͼ����ֲ�</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">�˳�</a></span>
     </div>
</div>

<div class="content">
       <div class="newslist">
         <span class="newslist_title">�ѷ��������б�</span><br><br><br>
         <?php 
         include 'manage/newslist.php';
	     $newslist = new newslist();
	     $data = $newslist ->get_news_list();
	     for( $i = 0; $i < count($data); $i++){
	     	list($title, $time, $content) = explode( '|' ,$data[$i]);
	     	?>
	     	<div class="single_news">
              <span class="news_title"><?php echo ($i+1).'.'.$title?> </span> <span><?php echo $time?></span><br>
              <span class="news_button"> <a href="news_edit.php?name=<?php echo $i?>"> �༭ </a></span> 
              <span class="news_button"> <a href="news_del.php?name=<?php echo $i?>"> ɾ�� </a></span> 
            </div>
	     	<?php 
	     }
         ?>
         
         
       </div>
       
       <div class="newsform">
       <form  method="post" action="news_add.php">
           <span class="newsform_title">��������</span><br>
           <span class="choicel">�������:</span><input class="search_text" name="title" type="text"  /><br>
           <span class="choicel">��������:</span><br/><textarea id="resume" name="content" rows="18" cols="65"></textarea><br>
           <input  type="submit" value="���"/>
           <input type="reset" name="reset" value="����"/>
        </form>
      </div>
       
       
</div>

 </body>
 </html> 



<?php 
     }
?>
  


