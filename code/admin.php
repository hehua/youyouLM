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
<link rel="stylesheet" type="text/css" href="css/public.css" />
<link rel="stylesheet" type="text/css" href="css/first.css" />
<title>��У��ͼ����������ƽ̨</title>
</head>
<body >
<?php 
    include 'mydate.php';
	include 'manage/applylist.php';
	include 'manage/employ_list.php';
	$elist = new employ_list;
	$applylist = new applylist();
	$date = new mydate();
	$appdata = $applylist->get_all_list();
	$checknum = count ( $applylist->get_notread_list() );
?>

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
       <span class="daohang_words" id="daohang_a"> <a href="apply_single.php?name=0">��ٴ���<?php if($checknum!=0) {echo '('.$checknum.')';}?></a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_admin.php">ͼ����ֲ�</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">�˳�</a></span>
     </div>
</div>

<div class="content">

       <div class="myinform">
          <?php
       if($checknum !=0) {
       	?>
       	<span class="newslist_title">δ���������(<?php echo $checknum?>)</span><br>
          <?php 
          for( $i = 0; $i < count($appdata); $i++){
	     	list($title, $time, $content,$e_id,$readyes) = explode( '|' ,$appdata[$i]);
	     	$ename = $elist->get_eploy_name($e_id);
	     	?>
	     	 <?php 
              if($readyes == '0'){
              	?>
             <div class="single_news">
                <span class="news_title">
                   <a href="apply_single.php?name=<?php echo $i?>">
                     <?php echo $title?>--->��<?php echo $ename?>��
                   </a>
                </span>  
             </div>
              	<?php
              }
              ?>
            
	     	<?php 
	     }
       }
       ?>
          
       </div>
       
</div>

 </body>
 </html> 



<?php 
     }
?>
  


