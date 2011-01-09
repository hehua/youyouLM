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
<title>登陆中</title>
</head>
<body style="background-colorL:gray;">
<span>  账号或密码错误，请重新登录</span>

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
<title>东校区图书馆助理管理平台</title>
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
        <span class="head1">东校区图书馆助理管理平台</span><br>
     </div>
</div>


<div class="daohang">
     <div class="daohang_center">
       <span  id="daohang_a"> <a href="admin.php">首 页</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_admin.php">通知管理</a></span>      
       <span class="daohang_words" id="daohang_a"> <a href="news_admin.php">公告管理</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_single.php?name=0">请假处理<?php if($checknum!=0) {echo '('.$checknum.')';}?></a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_admin.php">图书馆手册</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">退出</a></span>
     </div>
</div>

<div class="content">

       <div class="myinform">
          <?php
       if($checknum !=0) {
       	?>
       	<span class="newslist_title">未读请假申请(<?php echo $checknum?>)</span><br>
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
                     <?php echo $title?>--->‘<?php echo $ename?>’
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
  


