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


<div class="banner">
     <div class="banner_center">
        <span class="head1">东校区图书馆助理管理平台</span><br>
     </div>
</div>
<?php 
         include 'manage/informlist.php';
	     $informlist = new informlist();
	     //$informlist->add_inform('yr','2010-02-01 12:12:33','dqwqd','hanks','0');
	    //$informlist->del_inform('yr','2010-02-01 12:12:33','hanks');
	     $data = $informlist ->get_inform_list($eid);
	     $checknum = $informlist->get_notread_num($eid);
	     //print 'ddddd';
	     //print_r($data);
?>

<div class="daohang">
     <div class="daohang_center">
       <span  id="daohang_a"> <a href="first.php">首 页</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="inform_single.php?name=0">我的通知<?php if($checknum!=0) {echo '('.$checknum.')';}?></a></span>  
       <span class="daohang_words" id="daohang_a"> <a href="news_single.php?name=0">最新公告</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="mydata.php">我的资料</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="apply_add.php">请假申请</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="knows_single.php?name=0">图书馆手册</a></span>
       <span class="daohang_words" id="daohang_a"> <a href="">退出</a></span>
     </div>
</div>

<div class="content">
       <div class="myinform">
       <?php 
       
       if($checknum !=0) {
       	?>
       	<span class="newslist_title">未读通知(<?php echo $checknum?>)</span><br>
          <?php 
          for( $i = 0; $i < count($data); $i++){
	     	list($title, $time, $content,$e_id,$readyes) = explode( '|' ,$data[$i]);
	     	$ename = $informlist->get_name_eid($e_id);
	     	?>
	     	 <?php 
              if($readyes == '0'){
              	?>
             <div class="single_news">
                <span class="news_title">
                   <a href="inform_single.php?name=<?php echo $i?>">
                     <?php echo $title?>---致‘<?php echo $ename?>’
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
       
          
         <?php 
          include 'manage/newslist.php';
         $newslist = new newslist();
	     $newdata = $newslist->get_news_list();
         ?>
         <span class="newslist_title">最新公告(<?php echo count($newdata)?>)</span><br>
          <?php 
          for( $i = count($newdata)-1; $i >= 0; $i--){
	     	list($title, $time, $content) = explode( '|' ,$newdata[$i]);
	     	?>
             <div class="single_news">
                <span class="news_title">
                   <a href="news_single.php?name=<?php echo $i?>">
                     <?php echo (count($newdata)-$i).'.'.$title?>---‘<?php echo $time?>’
                   </a>
                </span>  
             </div>
         
	     	<?php 
	     }
         ?>
       </div>
</div>

 </body>
 </html> 



<?php 
     }
?>
  


